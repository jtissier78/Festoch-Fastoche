<?php 
$filename = '../csv/ff.csv';

$excel_array = [];

   // Open the file for reading
   if (($h = fopen("{$filename}", "r")) !== FALSE) 
   {
       // Each line in the file is converted into an individual array that we call $data
       // The items of the array are comma separated
       // 
       while (($data = fgetcsv($h, 0, ";")) !== FALSE) 
       {
           // Each individual array is being pushed into the nested array
       $excel_array[] = $data;		
       }
   
         // Close the file
         fclose($h);
   
    }

    //charge data from the colum of the csv
    function saveColData ($excel_array,$LineStart,$col){
        for ($i=$LineStart; $i< sizeof($excel_array) ; $i++)
            {
                
                for($j=0 ; $j<= sizeof($excel_array); $j++)
                {
                    if($j==$col){
                        $data[$i][$j] = $excel_array[$i][$j];
                    }
                }
            }
        return $data;
    }

    //transform array of colum into a linear array
    function linear($col_data,$line,$col){
        for($i=$line; $i<sizeof($col_data);$i++){
            $data[$i] = $col_data[$i][$col];
        }
        return $data;
    }




?>