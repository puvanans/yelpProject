
<?php 
    

    $API_key = "6k3RxTH6fmFnauS3YV8uHGwgzKDadRY7RD6q8KpD1JxUjWD3HlijGm3VVpVGxWLcHPONwcxE44R4ThHkqLVC7qdIecPDXguJYat5E4h_OUmzwo5lGvJl6cUs5x2JYnYx"
            //unique id provided by the yelp developer account
            //https://www.yelp.com/developers/v3/manage_app

    assert($API_key,"Please enter in your API key");
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
    


?>