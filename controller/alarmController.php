<?php
class AlarmController
{

    /*
     * fetch holidays for a year and the next year from an external server if necessary and update our internal database of holidays
     * @author  SGV
     * @version 20201111    1.1   initial release
     * @param  <int> $year (defaults to current year)
     * @return <bool>  true in case of success
     *           OR
     *           <string> with the description of the error
     */
    function updateHolidays($year = false)
    {
        if (!$year) {
            $currentDT = new \DateTime();
            $year = $currentDT->format('Y');
        }
        $yearsToUpdate = [$year, $year + 1];
        // Process each year
        foreach ($yearsToUpdate as $yearToUpdate) {
            $urlToGet = file_get_contents('https://api.calendario.com.br/?ano=' . $yearToUpdate . '&estado=PR&cidade=CURITIBAO&token=c2VyZ2lvZ212MThAZ21haWwuY29tJmhhc2g9NDcwNTE0MDM');
            $objXmlDocument = new \DOMDocument();
            $objXmlDocument->loadXML($urlToGet);
            $validateDocument = $objXmlDocument->validateOnParse = true;
            // Convert xml document to json
            $eventTags = $objXmlDocument->getElementsByTagName('event');
            $holidays = [];
            if (count($eventTags) > 0) {
                foreach ($eventTags as $eventTag) {
                    $holiDate = $eventTag->getElementsByTagName('date')->item(0)->nodeValue;
                    $holiName = $eventTag->getElementsByTagName('name')->item(0)->nodeValue;
                    $holidays[$holiDate] = $holiName;
                }
            }
            $jsonDocument = json_encode($holidays);
            $saveDocumentName = '/xampp/htdocs/newTcc' . $yearToUpdate . 'holiday.json';
            file_put_contents($saveDocumentName, $jsonDocument);
        }
        return true;
    }
    /*
     *  check if it is a holiday and create or change text of docuemt
     *  @author  SGV
     *  @version 20201111    1.1   initial release
     *  @param   <int> $nowDT (current date time)
     *  @return <bool> today day is a holiday (true==if it's a holiday, false==it's not a holiday)
     *                 AND
     *          <string> to write the holiday move on the document todayIsHoliday.json
     */
    function checkIfTodayIsHoliday()
    {
        $nowDT = new \DateTime();
        $year = $nowDT->format('Y');
        $holidaysDocumentPath = file_get_contents('/xampp/htdocs/newTcc' . $year . 'holiday.json');
        $HolidaysDocument = json_decode($holidaysDocumentPath, true);
        $currentDateFormatted = $nowDT->format('d/m/Y');
        // $currentDateFormatted = "25/02/2020";
        $textTodayIsHoliday = '';
        if (array_key_exists($currentDateFormatted, $HolidaysDocument)) {
            $textTodayIsHoliday = 'true';
            // return true;
        } else {
            $textTodayIsHoliday = 'false';
        }

        $saveStateHoliday = '/xampp/htdocs/newTcc/todayIsHoliday.txt';
        file_put_contents($saveStateHoliday, $textTodayIsHoliday);
        return true;
    }
    /*
     *  change state of alam and create file for executable C 
     *  @author  SGV
     *  @version 20210420   1.0   initial release
     *  @param   <bool> $stateOfAlarm (change state of alarm)
     *  @return <bool>  (true==yes he managed to create the file, false == failed to create the file)
     *                 
     */
    function changeEstateOfAlarm()
    {
        $stateOfAlarm = true;
        $AlarmWk = new AlarmController();
        $messageToUser = '';
        $title = '';
        $message = '';
        $saveStateOfAlarm = '';
        if ($stateOfAlarm != false) {
            $saveStateOfAlarm = '/xampp/htdocs/universityThesi/ligado.txt';
            if (unlink('/xampp/htdocs/universityThesi/desligado.txt')) {
                $title = 'change state of alarm';
                $message = 'failed to delete the folder "desligado" for the new alarm status';
                $AlarmWk->sendErrorMessage($title, $message);
            }
            file_put_contents($saveStateOfAlarm, '');
            $messageToUser = 'alarme ligado';
        } else {
            $saveStateOfAlarm = '/xampp/htdocs/universityThesi/desligado.txt';
            if (unlink('/xampp/htdocs/universityThesi/ligado.txt')) {
                $title = 'change state of alarm';
                $message = 'failed to delete the folder "ligado" for the new alarm status';
                $AlarmWk->sendErrorMessage($title, $message);
            }
            file_put_contents($saveStateOfAlarm, '');
            $messageToUser = 'alarme desligado';
            return $messageToUser;
        }
    }

    /*
     *  
     *  @author  SGV
     *  @version 20201111    1.0   initial release
     *  @param   <int> $nowDT (current date time)
     *  @return <bool> today day is a holiday (true==if it's a holiday, false==it's not a holiday)
     *                 AND
     *          <string> to write the holiday move on the document todayIsHoliday.json
     */
    function sendErrorMessage($title, $message)
    {
        $to = "sergiogmv18@gmail.com";
        return mail($to, $title, $message);
    }
}
