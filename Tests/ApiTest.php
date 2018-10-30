<? php
namespace Tests;

class ApiTest extends \PHPUnit_Framework_TestCase
{
	public function signinMethod(){
    	// create our http client (Guzzle)
    	$client = new Client('http://localhost/checkin');

    	$data = array(
        	'phone_no' => "07000000001"
    	);

    	$request = $client->get('/account/signin', null, json_encode($data));
    	$response = $request->send();

    	$this->assertEquals(405, $response->getStatusCode());
    	$this->assertTrue($response->hasHeader('Location'));
    	$data = json_decode($response->getBody(true), true);
    	$this->assertArrayHasKey('nickname', $data);
	}

	public function signinAccountNotFound(){
    	// create our http client (Guzzle)
    	$client = new Client('http://localhost/checkin');

    	$data = array(
        	'phone_no' => '07000000321'
    	);

    	$request = $client->get('/account/signin', null, json_encode($data));
    	$response = $request->send();

    	$this->assertEquals(200, $response->getStatusCode());
    	$data = json_decode($response->getBody(true), true);
    	$this->assertArrayHasKey('message', $data);
    	$this->assertEquals("00", $data["status_code"]);
	}

	public function signupMissingParam(){
    	// create our http client (Guzzle)
    	$client = new Client('http://localhost/checkin');

    	$data = array(
        	'phone_no' => '07000000921',
        	'email' => 'abc@def.gh'
    	);

    	$request = $client->get('/account/signup', null, json_encode($data));
    	$response = $request->send();

    	$this->assertEquals(400, $response->getStatusCode());
    	$data = json_decode($response->getBody(true), true);
    	$this->assertArrayHasKey('message', $data);
    	$this->assertEquals("00", $data["status_code"]);
	}


	public function logPost(){
    	// create our http client (Guzzle)
    	$client = new Client('http://localhost/checkin');

    	$data = array(
        	'visitor_id' => '07000000921',
        	'employee_id' => '23',
        	'purpose' => 'Official'
    	);

    	$request = $client->get('/log', null, json_encode($data));
    	$response = $request->send();

    	$this->assertEquals(200, $response->getStatusCode());
    	$data = json_decode($response->getBody(true), true);
    	$this->assertArrayHasKey('message', $data);
    	$this->assertEquals("01", $data["status_code"]);
	}
}