
<?php 
    

    $API_key = "6k3RxTH6fmFnauS3YV8uHGwgzKDadRY7RD6q8KpD1JxUjWD3HlijGm3VVpVGxWLcHPONwcxE44R4ThHkqLVC7qdIecPDXguJYat5E4h_OUmzwo5lGvJl6cUs5x2JYnYx";
            //unique id provided by the yelp developer account
            //https://www.yelp.com/developers/v3/manage_app

    //assert($API_key,"Please enter in your API key");
            // This is check if the API key has been entered or not

            
    //These are the API constants.

    $API_host = "https://api.yelp.com/v3/";
            //This url is the host of yelp API, accessing any of yelp's Fusion API is through this endpoint
    
    $API_business_search = "businesses/search";
            //This endpoint is used for searching businesses based on keywords, category, location, and price etc.

    $API_business_details = "businesses/"; //Business ID should be added after the slash 
            //Get rich business data, such as name, address, phone number, photos, Yelp rating, price levels and hours of operation


    //Default search terms.

    $default_Term = "Coffee";

    $default_Location = "Philadelphia, PA";

    $search_Limit = 5;

    /*
    Function request is built to send request to the API itself and return the response

    parameters
     $host - The domain host of the API
     $path - The path of the API after the domain (depends on individual API requests)
     $url_params -  an Array of query-string parameters (query string are additional info (keys&fields)passed along with the url)

     return - The JSON response form the response
    */

    function makeRequest($host,$path,$url_params = array()){
            //This function sends the API call
         try
         {
                 $curl = curl_init();

                 if (false === $curl)
                        throw new Exception ('Failed to initialize');


                 $url = $host.$path."?".http_build_query($url_params);

                //the following method for setting option for th ecurl instacne could be defined individually, and that is what we are going to do.

                 /*
                 curl_setopt_array($curl,$array(
                         CURLOPT_URL => $url,
                         CURLOPT_RETURNTRANSFER => true, //captures response
                         CURLOPT_ENCODING => "",
                         CURLOPT_MAXREDIRS => 10,
                         CURLOPT_TIMEOUT => 30,
                         CURLOPT_HTTP_VERSION =>CURL_HTTP_VERSION_1_1,
                         CURLOPT_CUSTOMREQUEST => "GET",
                         CURLOPT_HTTPHEADER=>array
                         (
                                 "authorization:Bearer".$GLOBALS['API_key'],
                                 "cache-control:no-cache",
                         ),
                        ));
                */

                curl_setopt($curl,CURLOPT_URL,$url);
                
                curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);

                curl_setopt($curl,CURLOPT_ENCODING,"");

                curl_setopt($curl,CURLOPT_MAXREDIRS,10);

                curl_setopt($curl,CURLOPT_TIMEOUT,30);

                curl_setopt($curl,CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);

                curl_setopt($curl,CURLOPT_CUSTOMREQUEST,"GET");

                curl_setopt($curl,CURLOPT_HTTPHEADER, array(
                        "authorization:Bearer".$GLOBALS['API_key'],
                        "cache-control: no-cache",
),
                );
                

                $response = curl_exec($curl);

                if (false === $response)
                        throw new Exception(curl_error($curl),curl_errno($curl));

                $http_status = curl_getinfo($curl,CURLINFO_HTTP_CODE);
                if(200!=$http_status)
                        throw new Exception($response,$http_status);

                curl_close($curl);

         }
                catch (Exception $e) 
                {
                        trigger_error(sprintf(
                                'Curl failed with error'.'/n'.' #%d'.'/n'.':%s',
                                 $e->getCode(),
                                 $e->getMessage()),
                                 E_USER_ERROR);
                } 

         return $response;
    }

    $host = "https://api.yelp.com/v3/";
    $path = "businesses/search";
    $url_params = array(
        'name'=>'coffee',
        'location'=>'Philadelphia,PA',
    );

    makeRequest($host,$path,$url_params);


    


?>