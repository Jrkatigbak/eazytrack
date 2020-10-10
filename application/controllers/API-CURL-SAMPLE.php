
		 /* API URL */
		 $url = 'https://api.aftership.com/v4/trackings/myhermes-uk/9075087285251287';
             
		 /* Init cURL resource */
		 $ch = curl_init($url);
			 
		 /* Array Parameter Data */
		$data = [];

		//  FOR POST 
		// $data =  
		// '
		// 	{
		// 		"tracking": {
		// 			"tracking_number": "9473995285427787"
		// 		}
		// 	}
		// ';
		


			 
		 /* pass encoded JSON string to the POST fields */
		//  curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // SEND POST DATA

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET'); //GET DATA
			
		 /* set the content type json */
		 curl_setopt($ch, CURLOPT_HTTPHEADER, array(
					 'Content-Type:application/json',
					 'aftership-api-key: deb5b1b7-b285-4a95-949e-7e98b6a14922'
					//  'App-Secret: 1233'
				 ));
			 
		 /* set return type json */
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			 
		 /* execute request */
		 $result = curl_exec($ch);
		//  echo $result;
			
	
		 $result = json_decode($result); 
		 //var_dump($data);
		$batch_data = [];		 
		foreach($result->data as $tracking){
			foreach($tracking->checkpoints as $status){
				
				$data = [
					"message" => $status->message,
					"checkpoint_time" => $status->checkpoint_time,
					"location" => $status->location
				];
				array_push($batch_data,$data);

			}
		}
		$this->transaction_model->batchInsert_trackingUpdate($batch_data);

		//  echo $result;
		 /* close cURL resource */
		 curl_close($ch);

		 //////////////////////////////////////////////////////////////////////