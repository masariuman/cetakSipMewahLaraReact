<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TokenSiasn;

class SIASNController extends Controller
{
    public $bkn_sso = 'eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJBUWNPM0V3MVBmQV9MQ0FtY2J6YnRLUEhtcWhLS1dRbnZ1VDl0RUs3akc4In0.eyJleHAiOjE3MzE0Mjg4NDUsImlhdCI6MTczMTM4NTY0NSwianRpIjoiZGQ4MWEyNDAtYTVmNC00ZTdhLTkwY2QtYmM0OTFlNDdmNGNmIiwiaXNzIjoiaHR0cHM6Ly9zc28tc2lhc24uYmtuLmdvLmlkL2F1dGgvcmVhbG1zL3B1YmxpYy1zaWFzbiIsImF1ZCI6WyJpZGlzIiwiYWNjb3VudCJdLCJzdWIiOiI4MGVkNTY2Ni0wMjJhLTQ2NjYtOWMyNy03Yjk4MTA5MGZkZDkiLCJ0eXAiOiJCZWFyZXIiLCJhenAiOiJtZW1wYXdhaHdzIiwic2Vzc2lvbl9zdGF0ZSI6ImZlNTU5ZWM3LWUyNWItNGRjNi05MjA4LWFjZGRkNDFlZmRiNiIsImFjciI6IjEiLCJyZWFsbV9hY2Nlc3MiOnsicm9sZXMiOlsicm9sZTpzaWFzbi1pbnN0YW5zaTpwZXJlbWFqYWFuOm9wZXJhdG9yIiwicm9sZTpzaWFzbi1pbnN0YW5zaTpwZXJlbmNhbmFhbjppbnN0YW5zaS1vcGVyYXRvci1pbmZvamFiIiwicm9sZTpzaWFzbi1pbnN0YW5zaTpwaTpvcGVyYXRvciIsInJvbGU6c2lhc24taW5zdGFuc2k6cGVyZW5jYW5hYW46aW5zdGFuc2ktbW9uaXRvci1wZXJlbmNhbmFhbi1rZXBlZ2F3YWlhbiIsInJvbGU6c2lhc24taW5zdGFuc2k6cGVuZ2FkYWFuOmFwcHJvdmFsIiwicm9sZTpzaWFzbi1pbnN0YW5zaTprcDphcHByb3ZhbCIsInJvbGU6c2lhc24taW5zdGFuc2k6cGVuZ2FkYWFuOlRURSIsInJvbGU6c2lhc24taW5zdGFuc2k6cGVyZW1hamFhbjpyZWtvbiIsInJvbGU6c2lhc24taW5zdGFuc2k6a3A6b3BlcmF0b3IiLCJyb2xlOmRhc2hib2FyZC1rZWJpamFrYW46aW5zdGFuc2kiLCJyb2xlOm1hbmFqZW1lbi13czpkZXZlbG9wZXIiLCJvZmZsaW5lX2FjY2VzcyIsInJvbGU6c2lhc24taW5zdGFuc2k6YmF0YWxuaXA6b3BlcmF0b3IiLCJyb2xlOnNpYXNuLWluc3RhbnNpOnBlcmVuY2FuYWFuOmluc3RhbnNpLW9wZXJhdG9yLXBlbWVudWhhbi1rZWItcGVnYXdhaSIsInVtYV9hdXRob3JpemF0aW9uIiwicm9sZTpzaWFzbi1pbnN0YW5zaTpza2s6YXBwcm92YWwiLCJyb2xlOnNpYXNuLWluc3RhbnNpOnBlcmVuY2FuYWFuOmluc3RhbnNpLW9wZXJhdG9yLWV2YWphYiIsInJvbGU6c2lhc24taW5zdGFuc2k6cGVuZ2FkYWFuOnBhcmFmIiwicm9sZTpzaWFzbi1pbnN0YW5zaTpza2s6b3BlcmF0b3IiLCJyb2xlOnNpYXNuLWluc3RhbnNpOnBlcmVtYWphYW46YXBwcm92YWwiLCJyb2xlOnNpYXNuLWluc3RhbnNpOnBlcmVuY2FuYWFuOmluc3RhbnNpLW9wZXJhdG9yLXNvdGsiLCJyb2xlOmRhc2hib2FyZC1vcGVyYXNpb25hbDppbnN0YW5zaSIsInJvbGU6c2lhc24taW5zdGFuc2k6cGVuZ2FkYWFuOm9wZXJhdG9yIiwicm9sZTpzaWFzbi1pbnN0YW5zaTpwZW1iZXJoZW50aWFuOm9wZXJhdG9yIiwicm9sZTpzaWFzbi1pbnN0YW5zaTpwaTphcHByb3ZhbCIsInJvbGU6c2lhc24taW5zdGFuc2k6YmF0YWxuaXA6YXBwcm92YWwiLCJyb2xlOnNpYXNuLWluc3RhbnNpOnBlcmVuY2FuYWFuOmluc3RhbnNpLXBlbWJpbmEtcHBrIiwicm9sZTpzaWFzbi1pbnN0YW5zaTppcGFzbjptb25pdG9yaW5nIiwicm9sZTpzaWFzbi1pbnN0YW5zaTphZG1pbi10ZW1wbGF0ZSIsInJvbGU6c2lhc24taW5zdGFuc2k6cGVyZW5jYW5hYW46aW5zdGFuc2ktb3BlcmF0b3Itc3RhbmRhci1rb21wLWphYiIsInJvbGU6c2lhc24taW5zdGFuc2k6cGVtYmVyaGVudGlhbjphcHByb3ZhbCIsInJvbGU6c2lhc24taW5zdGFuc2k6cGVyZW5jYW5hYW46aW5zdGFuc2ktcGVuZXRhcGFuLXNvdGsiLCJyb2xlOnNpYXNuLWluc3RhbnNpOnByb2ZpbGFzbjp2aWV3cHJvZmlsIiwicm9sZTpkYXNoYm9hcmQtb3BlcmFzaW9uYWw6aW5zdGFuc2ktcGltcGluYW4iLCJyb2xlOnNpYXNuLWluc3RhbnNpOnBlcmVuY2FuYWFuOmluc3RhbnNpLXZhbGlkYXRvci1zdGFuZGFyLWtvbXAtamFiIl19LCJyZXNvdXJjZV9hY2Nlc3MiOnsiaWRpcyI6eyJyb2xlcyI6WyJhZ2VuY3ktYWRtaW4iXX0sImFjY291bnQiOnsicm9sZXMiOlsibWFuYWdlLWFjY291bnQiLCJtYW5hZ2UtYWNjb3VudC1saW5rcyIsInZpZXctcHJvZmlsZSJdfX0sInNjb3BlIjoiZW1haWwgcHJvZmlsZSIsImVtYWlsX3ZlcmlmaWVkIjpmYWxzZSwibmFtZSI6IkFSSUYgU0VUSUFXQU4iLCJwcmVmZXJyZWRfdXNlcm5hbWUiOiIxOTk2MDMxNDIwMjAxMjEwMDMiLCJnaXZlbl9uYW1lIjoiQVJJRiIsImZhbWlseV9uYW1lIjoiU0VUSUFXQU4iLCJlbWFpbCI6ImFyaWZfc2V0aWF3YW5AZW5naW5lZXIuY29tIn0.Zj2FLkYXFd9JuursbBEXnEkinj54uBKaWJz-WBxcTTYbu3GTzwux4LdL_yzOaLDmztzwE_Y8yaXE4GP9rTqQCzdJ3b41wCmlrexubt0yj5-T9skHMbFEinGxWVRWWXbVrDE9LHNnmvsYy8m28fTXRgx4RGMNw4IVqYvLir8BAGcFPavyLINfspWiKzvXH9T_6LTf8kQvA7OZET-7y_94JJNM6m6VlG-sEw6T3tUTP99typIWSMBR1-34ZOAKOLir8Mf12PItzOiH1SyCYHFKgMeNUfJCYjTR_NnZbmah7HcOx_igKdsQPT4AU4kgv9O0Och2tl_JJ1lCinsCB_aoCw';
    public $api_ws = 'eyJ4NXQiOiJNell4TW1Ga09HWXdNV0kwWldObU5EY3hOR1l3WW1NNFpUQTNNV0kyTkRBelpHUXpOR00wWkdSbE5qSmtPREZrWkRSaU9URmtNV0ZoTXpVMlpHVmxOZyIsImtpZCI6Ik16WXhNbUZrT0dZd01XSTBaV05tTkRjeE5HWXdZbU00WlRBM01XSTJOREF6WkdRek5HTTBaR1JsTmpKa09ERmtaRFJpT1RGa01XRmhNelUyWkdWbE5nX1JTMjU2IiwiYWxnIjoiUlMyNTYifQ.eyJzdWIiOiIxOTk2MDMxNDIwMjAxMjEwMDMiLCJhdXQiOiJBUFBMSUNBVElPTiIsImF1ZCI6IjNXaVpLZUs2WDFxOVNnZHZENnJjbUlNTDE5TWEiLCJuYmYiOjE3MzY5MDk5MjksImF6cCI6IjNXaVpLZUs2WDFxOVNnZHZENnJjbUlNTDE5TWEiLCJzY29wZSI6ImRlZmF1bHQiLCJpc3MiOiJodHRwczpcL1wvbG9jYWxob3N0Ojk0NDNcL29hdXRoMlwvdG9rZW4iLCJleHAiOjE3MzY5MTM1MjksImlhdCI6MTczNjkwOTkyOSwianRpIjoiMTQ1NzFkNmEtNjQ1ZC00YWVlLWJkZTAtY2RlNzBhYjgyZGQxIn0.ajr-L0TSOnqAKRYqoe10EeCgk_0X93IC3XNrDW2lBrcCka6dqp7V8SkCcDQEtB5YulykZz0iZOQMNyXBAyfjr2fcFfnMjWviCn6eNBrUzh2HHlZYpQ0gvZr2quPgPFxOGQqDBDf9fhownAcFz_KJpywpai8SDCpks3Deynn0nVlxjQizqGMjRa9JJUod7QHDpypfLyX5FSy8mPP7O_ZvRCJogrvw-mmB2kXMzipVUXmCKxkiXYDoVx5JwLJRfkrGFOvDOQzVdUBSCmskhcCMYPyIrEWAky0uluO32j59IrnWbipoYcYVcrTcHHG6MHI7oMF6Jk6wvKoSb4jAYqm0DQ';

    public function dataUtama($nip){
        $authHeader = 'bearer '.$this->bkn_sso;
        $authorizationHeader = 'Bearer '.$this->api_ws;

        $nip = trim($nip);
        $authHeader = trim($authHeader);
        $authorizationHeader = trim($authorizationHeader);

        if (!preg_match('/^\d{18}$/', $nip)) {
            // Handle invalid NIP format, e.g., return an error response or redirect to an error page
            return;
        }

        // Set the API URL with the dynamic NIP parameter
        $api_url = 'https://apimws.bkn.go.id:8243/apisiasn/1.0/pns/data-utama/' . $nip;

        // Set headers for the request
        $headers = array(
            'accept: application/json',
            'Auth: ' . $authHeader,
            'Authorization: ' . $authorizationHeader,
            // Add any other headers if necessary
        );

        // Initialize cURL session
        $curl = curl_init();

        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => $headers,
        ));

        // Execute the cURL request
        $response = curl_exec($curl);

        // Close cURL session
        curl_close($curl);

        if (!$response) {
            // Handle API request failure, e.g., return an error response or redirect to an error page
            return;
        }

        // Parse the JSON response
        $data = json_decode($response);
        return $data->data;
    }

    function foto_pegawai($nip){
        $pegawai = $this->dataUtama($nip);
        if ($pegawai === "Data tidak ditemukan" || $pegawai === null) {
            return "{";
        }
        $pegawai_id = $pegawai->id;

        $tokenSiasn = TokenSiasn::first();
        $authHeader = 'bearer '.$this->bkn_sso;
        $authorizationHeader = 'Bearer '.$this->api_ws;
        $nip = trim($nip);
        $authHeader = trim($authHeader);
        $authorizationHeader = trim($authorizationHeader);
        if (!preg_match('/^\d{18}$/', $nip)) {
            // Handle invalid NIP format, e.g., return an error response or redirect to an error page
            echo "error";
            return;
        }

        // Set the API URL with the dynamic NIP parameter
        $api_url = 'https://apimws.bkn.go.id:8243/apisiasn/1.0/pns/photo/' . $pegawai_id;

        // Set headers for the request
        $headers = array(
            'accept: application/json',
            'Auth: ' . $authHeader,
            'Authorization: ' . $authorizationHeader,
            // Add any other headers if necessary
        );

        // Initialize cURL session
        $curl = curl_init();

        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => $headers,
        ));

        // Execute the cURL request
        $response = curl_exec($curl);
        return $response;
        // $foto_pegawai = "<img src='data:image/jpeg;base64,".base64_encode($response)."' />";
        // return $foto_pegawai;
    }

    function get_api_ws(){
        // $this->output->unset_template();
        $url = 'https://apimws.bkn.go.id/oauth2/token';
        $username = '3WiZKeK6X1q9SgdvD6rcmIML19Ma';
        $password = '9PNb0K__4nrmdgqYLMdzGoIg6lMa';

        // Create Basic Authentication header
        $authHeader = base64_encode($username . ':' . $password);

        // Set the POST data for the request
        $data = array(
            'grant_type' => 'client_credentials'
        );

        // Build URL-encoded query string for the POST data
        $queryString = http_build_query($data);

        // Initialize cURL session
        $curl = curl_init();

        // Set cURL options
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $queryString,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic ' . $authHeader,
                'Content-Type: application/x-www-form-urlencoded'
            )
        ));

        // Execute the cURL request
        $response = curl_exec($curl);

        // Close cURL session
        curl_close($curl);

        // Handle the response
        if ($response) {
            $json = json_decode($response);
            if(!empty($json->access_token)){
                // simpan access_token
                // echo $json->access_token;
                $select = TokenSiasn::first();
                $select->update([
                    'api_ws' => $json->access_token
                ]);
                $return['status'] = true;
                $return['message'] = "API WS Token Berhasil di Update";
            }
            else {
                $return['status'] = false;
                $return['message'] = $json->error;
            }
            return $return;
        } else {
            // Handle API request failure
            $return['status'] = false;
            $return['message'] = "Error: " . curl_error($curl);
        }
    }

    function get_bkn_sso(){
        $curl = curl_init();
        curl_setopt_array(
            $curl, array(
            CURLOPT_URL => 'https://sso-siasn.bkn.go.id/auth/realms/public-siasn/protocol/openid-connect/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'client_id=mempawahws&grant_type=password&username=199603142020121003&password=Hahaha96',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded',
                'Cookie: SERVERID=keycloak-01|ZMs/L|ZMs/L'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $json = json_decode($response);
        if(!empty($json->access_token)){
            // simpan access_token
            $select = TokenSiasn::first();
            $select->update([
                'bkn_sso' => $json->access_token
            ]);
            $return['status'] = true;
            $return['message'] = "SSO Token Berhasil di Update";
        }
        else {
            $return['status'] = false;
            $return['message'] = $json->error;
        }
        return $return;
    }

    public function set_token(){
        $this->api_ws = 'eyJ4NXQiOiJNell4TW1Ga09HWXdNV0kwWldObU5EY3hOR1l3WW1NNFpUQTNNV0kyTkRBelpHUXpOR00wWkdSbE5qSmtPREZrWkRSaU9URmtNV0ZoTXpVMlpHVmxOZyIsImtpZCI6Ik16WXhNbUZrT0dZd01XSTBaV05tTkRjeE5HWXdZbU00WlRBM01XSTJOREF6WkdRek5HTTBaR1JsTmpKa09ERmtaRFJpT1RGa01XRmhNelUyWkdWbE5nX1JTMjU2IiwiYWxnIjoiUlMyNTYifQ.eyJzdWIiOiIxOTk2MDMxNDIwMjAxMjEwMDMiLCJhdXQiOiJBUFBMSUNBVElPTiIsImF1ZCI6IjNXaVpLZUs2WDFxOVNnZHZENnJjbUlNTDE5TWEiLCJuYmYiOjE3MzY5MDk5MjksImF6cCI6IjNXaVpLZUs2WDFxOVNnZHZENnJjbUlNTDE5TWEiLCJzY29wZSI6ImRlZmF1bHQiLCJpc3MiOiJodHRwczpcL1wvbG9jYWxob3N0Ojk0NDNcL29hdXRoMlwvdG9rZW4iLCJleHAiOjE3MzY5MTM1MjksImlhdCI6MTczNjkwOTkyOSwianRpIjoiMTQ1NzFkNmEtNjQ1ZC00YWVlLWJkZTAtY2RlNzBhYjgyZGQxIn0.ajr-L0TSOnqAKRYqoe10EeCgk_0X93IC3XNrDW2lBrcCka6dqp7V8SkCcDQEtB5YulykZz0iZOQMNyXBAyfjr2fcFfnMjWviCn6eNBrUzh2HHlZYpQ0gvZr2quPgPFxOGQqDBDf9fhownAcFz_KJpywpai8SDCpks3Deynn0nVlxjQizqGMjRa9JJUod7QHDpypfLyX5FSy8mPP7O_ZvRCJogrvw-mmB2kXMzipVUXmCKxkiXYDoVx5JwLJRfkrGFOvDOQzVdUBSCmskhcCMYPyIrEWAky0uluO32j59IrnWbipoYcYVcrTcHHG6MHI7oMF6Jk6wvKoSb4jAYqm0DQ';
        $this->bkn_sso = 'eyJhbGciOiJSUzI1NiIsInR5cCIgOiAiSldUIiwia2lkIiA6ICJBUWNPM0V3MVBmQV9MQ0FtY2J6YnRLUEhtcWhLS1dRbnZ1VDl0RUs3akc4In0.eyJleHAiOjE3MzE0Mjg4NDUsImlhdCI6MTczMTM4NTY0NSwianRpIjoiZGQ4MWEyNDAtYTVmNC00ZTdhLTkwY2QtYmM0OTFlNDdmNGNmIiwiaXNzIjoiaHR0cHM6Ly9zc28tc2lhc24uYmtuLmdvLmlkL2F1dGgvcmVhbG1zL3B1YmxpYy1zaWFzbiIsImF1ZCI6WyJpZGlzIiwiYWNjb3VudCJdLCJzdWIiOiI4MGVkNTY2Ni0wMjJhLTQ2NjYtOWMyNy03Yjk4MTA5MGZkZDkiLCJ0eXAiOiJCZWFyZXIiLCJhenAiOiJtZW1wYXdhaHdzIiwic2Vzc2lvbl9zdGF0ZSI6ImZlNTU5ZWM3LWUyNWItNGRjNi05MjA4LWFjZGRkNDFlZmRiNiIsImFjciI6IjEiLCJyZWFsbV9hY2Nlc3MiOnsicm9sZXMiOlsicm9sZTpzaWFzbi1pbnN0YW5zaTpwZXJlbWFqYWFuOm9wZXJhdG9yIiwicm9sZTpzaWFzbi1pbnN0YW5zaTpwZXJlbmNhbmFhbjppbnN0YW5zaS1vcGVyYXRvci1pbmZvamFiIiwicm9sZTpzaWFzbi1pbnN0YW5zaTpwaTpvcGVyYXRvciIsInJvbGU6c2lhc24taW5zdGFuc2k6cGVyZW5jYW5hYW46aW5zdGFuc2ktbW9uaXRvci1wZXJlbmNhbmFhbi1rZXBlZ2F3YWlhbiIsInJvbGU6c2lhc24taW5zdGFuc2k6cGVuZ2FkYWFuOmFwcHJvdmFsIiwicm9sZTpzaWFzbi1pbnN0YW5zaTprcDphcHByb3ZhbCIsInJvbGU6c2lhc24taW5zdGFuc2k6cGVuZ2FkYWFuOlRURSIsInJvbGU6c2lhc24taW5zdGFuc2k6cGVyZW1hamFhbjpyZWtvbiIsInJvbGU6c2lhc24taW5zdGFuc2k6a3A6b3BlcmF0b3IiLCJyb2xlOmRhc2hib2FyZC1rZWJpamFrYW46aW5zdGFuc2kiLCJyb2xlOm1hbmFqZW1lbi13czpkZXZlbG9wZXIiLCJvZmZsaW5lX2FjY2VzcyIsInJvbGU6c2lhc24taW5zdGFuc2k6YmF0YWxuaXA6b3BlcmF0b3IiLCJyb2xlOnNpYXNuLWluc3RhbnNpOnBlcmVuY2FuYWFuOmluc3RhbnNpLW9wZXJhdG9yLXBlbWVudWhhbi1rZWItcGVnYXdhaSIsInVtYV9hdXRob3JpemF0aW9uIiwicm9sZTpzaWFzbi1pbnN0YW5zaTpza2s6YXBwcm92YWwiLCJyb2xlOnNpYXNuLWluc3RhbnNpOnBlcmVuY2FuYWFuOmluc3RhbnNpLW9wZXJhdG9yLWV2YWphYiIsInJvbGU6c2lhc24taW5zdGFuc2k6cGVuZ2FkYWFuOnBhcmFmIiwicm9sZTpzaWFzbi1pbnN0YW5zaTpza2s6b3BlcmF0b3IiLCJyb2xlOnNpYXNuLWluc3RhbnNpOnBlcmVtYWphYW46YXBwcm92YWwiLCJyb2xlOnNpYXNuLWluc3RhbnNpOnBlcmVuY2FuYWFuOmluc3RhbnNpLW9wZXJhdG9yLXNvdGsiLCJyb2xlOmRhc2hib2FyZC1vcGVyYXNpb25hbDppbnN0YW5zaSIsInJvbGU6c2lhc24taW5zdGFuc2k6cGVuZ2FkYWFuOm9wZXJhdG9yIiwicm9sZTpzaWFzbi1pbnN0YW5zaTpwZW1iZXJoZW50aWFuOm9wZXJhdG9yIiwicm9sZTpzaWFzbi1pbnN0YW5zaTpwaTphcHByb3ZhbCIsInJvbGU6c2lhc24taW5zdGFuc2k6YmF0YWxuaXA6YXBwcm92YWwiLCJyb2xlOnNpYXNuLWluc3RhbnNpOnBlcmVuY2FuYWFuOmluc3RhbnNpLXBlbWJpbmEtcHBrIiwicm9sZTpzaWFzbi1pbnN0YW5zaTppcGFzbjptb25pdG9yaW5nIiwicm9sZTpzaWFzbi1pbnN0YW5zaTphZG1pbi10ZW1wbGF0ZSIsInJvbGU6c2lhc24taW5zdGFuc2k6cGVyZW5jYW5hYW46aW5zdGFuc2ktb3BlcmF0b3Itc3RhbmRhci1rb21wLWphYiIsInJvbGU6c2lhc24taW5zdGFuc2k6cGVtYmVyaGVudGlhbjphcHByb3ZhbCIsInJvbGU6c2lhc24taW5zdGFuc2k6cGVyZW5jYW5hYW46aW5zdGFuc2ktcGVuZXRhcGFuLXNvdGsiLCJyb2xlOnNpYXNuLWluc3RhbnNpOnByb2ZpbGFzbjp2aWV3cHJvZmlsIiwicm9sZTpkYXNoYm9hcmQtb3BlcmFzaW9uYWw6aW5zdGFuc2ktcGltcGluYW4iLCJyb2xlOnNpYXNuLWluc3RhbnNpOnBlcmVuY2FuYWFuOmluc3RhbnNpLXZhbGlkYXRvci1zdGFuZGFyLWtvbXAtamFiIl19LCJyZXNvdXJjZV9hY2Nlc3MiOnsiaWRpcyI6eyJyb2xlcyI6WyJhZ2VuY3ktYWRtaW4iXX0sImFjY291bnQiOnsicm9sZXMiOlsibWFuYWdlLWFjY291bnQiLCJtYW5hZ2UtYWNjb3VudC1saW5rcyIsInZpZXctcHJvZmlsZSJdfX0sInNjb3BlIjoiZW1haWwgcHJvZmlsZSIsImVtYWlsX3ZlcmlmaWVkIjpmYWxzZSwibmFtZSI6IkFSSUYgU0VUSUFXQU4iLCJwcmVmZXJyZWRfdXNlcm5hbWUiOiIxOTk2MDMxNDIwMjAxMjEwMDMiLCJnaXZlbl9uYW1lIjoiQVJJRiIsImZhbWlseV9uYW1lIjoiU0VUSUFXQU4iLCJlbWFpbCI6ImFyaWZfc2V0aWF3YW5AZW5naW5lZXIuY29tIn0.Zj2FLkYXFd9JuursbBEXnEkinj54uBKaWJz-WBxcTTYbu3GTzwux4LdL_yzOaLDmztzwE_Y8yaXE4GP9rTqQCzdJ3b41wCmlrexubt0yj5-T9skHMbFEinGxWVRWWXbVrDE9LHNnmvsYy8m28fTXRgx4RGMNw4IVqYvLir8BAGcFPavyLINfspWiKzvXH9T_6LTf8kQvA7OZET-7y_94JJNM6m6VlG-sEw6T3tUTP99typIWSMBR1-34ZOAKOLir8Mf12PItzOiH1SyCYHFKgMeNUfJCYjTR_NnZbmah7HcOx_igKdsQPT4AU4kgv9O0Och2tl_JJ1lCinsCB_aoCw';


    }
}
