ECOES API library
=================

This library provides an API client for communicating with the ECOES API.

It uses Guzzle as a the underlying HTTP client. 

Making requests
---------------

### SearchUtilityAddress

    $ecoes = new Ecoes\Api('API KEY GOES HERE');
    $request = new Ecoes\SearchUtilityAddress\Request('POSTCODE');
    // $matches will be an array of matching addresses.
    $matches = $ecoes->SearchUtilityAddress($request)->getUtilityAddressMatches();

### GetTechnicalDetailsByMpan
    
    $ecoes = new Ecoes\Api('API KEY GOES HERE');
    $request = new Ecoes\GetTechnicalDetailsByMpan\Request('MPAN');
    // $matches will be an array of matching MPANs.
    $matches = $ecoes->GetTechnicalDetailsByMpan($request)->getUtilityMatches();
    // $match will be an array of a single matched MPAN.
    $match = $ecoes->GetTechnicalDetailsByMpan($request)->getUtilityMatch();
