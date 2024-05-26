<?php

namespace App\Services;

class Geocode {
  protected $api_url;
  protected $api_key;
  protected $debug;

  function __construct($debug = 0) {
    $this->api_url = env("GOOGLE_MAP_GEOCODE_API_URL"); 
    $this->api_key = env('GOOGLE_MAPS_GEOCODING_API_KEY');
    $this->debug = $debug;
  }

  public function request($url, $parameters) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url . "?" . http_build_query($parameters));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $result = curl_exec($ch);

    return $result;
  }

  public function getAddress($latitude, $longitude) {
    $data = [
      'latlng' => "$latitude,$longitude",
      'key' => $this->api_key
    ];

    $addressData = $this->request($this->api_url, $data);

    return (json_decode($addressData)->results[0]->formatted_address);
  }

  public function getCoordinates($address) {
    $data = [
      'address' => $address,
      'key' => $this->api_key
    ];

    $addressData = $this->request($this->api_url, $data);

    $location = json_decode($addressData)->results[0]->geometry->location;

    return ['latitude' => $location->lat, 'longitude' => $location->lng];
  }

  public function fillGPSCoord($dataAddress) {
		if($dataAddress['address'] && $dataAddress['postal_code'] && $dataAddress['city']) {
			$coord = $this->getCoordinates(
				$dataAddress['address'] 
				. ", " 
				. $dataAddress['postal_code'] 
				. " "  
				. $dataAddress['city'] 
				. ", " 
				. env('GOOGLE_MAPS_LOCALE')
			);

			if($coord['latitude'] && $coord['longitude']) {
				$dataAddress['latitude'] = $coord['latitude'];
				$dataAddress['longitude'] = $coord['longitude'];
			}
		}

		return $dataAddress;
	}
}
