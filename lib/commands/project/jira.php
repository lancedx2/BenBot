<?php
/*
How to use:

$jira = new jira();
echo $jira->get_project_status("RI-499");

it returns this: {"status":"QA"}

*/

class jira {
    private $jira_url = 'http://jira.orbsix.com';
    private $username = 'boydell';
    private $password = 'd0rktr0n';

    function get_project_details($issue_key){
	    $jira_data = array(
			    "jql"           => "issuekey = " . $issue_key,
			    "maxResults"    => "1024"
			    );

	    $jira_project = $this->get_from_jira('search', $jira_data);


	    return json_encode(array(
	 			"status" => $jira_project->issues[0]->fields->status->name,
				"summary" => $jira_project->issues[0]->fields->summary
				));
    }

    function get_project_status($issue_key){
        $jira_data = array(
                "jql"           => "issuekey = " . $issue_key,
                "maxResults"    => "1024"
            );
    
        $jira_project = $this->get_from_jira('search', $jira_data);
        
        return json_encode(array("status" => $jira_project->issues[0]->fields->status->name));
    }
    
    function put_to_jira($resource, $data) {
        $jdata = json_encode($data);
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_CUSTOMREQUEST=>"PUT",
            CURLOPT_URL => $this->jira_url . '/rest/api/latest/' . $resource,
            CURLOPT_USERPWD => $this->username . ':' . $this->password,
            CURLOPT_POSTFIELDS => $jdata,
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/json'
                ),
            CURLOPT_RETURNTRANSFER => true
        ));
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result);
    }
    
    function post_to_jira($resource, $data) {
        $jdata = json_encode($data);
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_POST => 1,
            CURLOPT_URL => $this->jira_url . '/rest/api/latest/' . $resource,
            CURLOPT_USERPWD => $this->username . ':' . $this->password,
            CURLOPT_POSTFIELDS => $jdata,
            CURLOPT_HTTPHEADER => array('Content-type: application/json'),
            CURLOPT_RETURNTRANSFER => true
        ));
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result);
    }
    
    function get_from_jira($resource, $data) {
        //convert array to JSON string
        $jdata = json_encode($data);
        $ch = curl_init();
        //configure CURL
        curl_setopt_array($ch, array(
            CURLOPT_URL => $this->jira_url . '/rest/api/latest/' . $resource,
            CURLOPT_USERPWD => $this->username . ':' . $this->password,
            CURLOPT_POSTFIELDS => $jdata,
            CURLOPT_HTTPHEADER => array('Content-type: application/json'),
            CURLOPT_RETURNTRANSFER => true
        ));
        $result = curl_exec($ch);
        if($result === false) {
            echo 'Curl error: ' . curl_error($ch);
        } else {
            //var_dump($result);
        }
        curl_close($ch);
        //convert JSON data back to PHP array
        return json_decode($result);
    }
    
}
