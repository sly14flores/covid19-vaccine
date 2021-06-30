<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>API DOCS - Covid19 Vaccines</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.print.css") }}" media="print">
    <script src="{{ asset("vendor/scribe/js/theme-default-3.0.2.js") }}"></script>

    <link rel="stylesheet"
          href="//unpkg.com/@highlightjs/cdn-assets@10.7.2/styles/obsidian.min.css">
    <script src="//unpkg.com/@highlightjs/cdn-assets@10.7.2/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>

    <script src="//cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>
    <script>
        var baseUrl = "https://vaccines.local";
    </script>
    <script src="{{ asset("vendor/scribe/js/tryitout-3.0.2.js") }}"></script>

</head>

<body class="" data-languages="[&quot;javascript&quot;]">
<a href="#" id="nav-button">
      <span>
        MENU
        <img src="{{ asset("vendor/scribe/images/navbar.png") }}" alt="navbar-image" />
      </span>
</a>
<div class="tocify-wrapper">
                <div class="lang-selector">
                            <a href="#" data-language-name="javascript">javascript</a>
                    </div>
        <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>
    <ul class="search-results"></ul>

    <ul id="toc">
    </ul>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                    </ul>
            <ul class="toc-footer" id="last-updated">
            <li>Last updated: June 30 2021</li>
        </ul>
</div>
<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1>Introduction</h1>
<p>API Documentation</p>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">https://vaccines.local</code></pre>

        <h1>Authenticating requests</h1>
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p>

        <h1 id="monitoring">Monitoring</h1>
    <p>
        
    </p>

            <h2 id="monitoring-POSTapi-doh-vaccines-monitoring-info--id-">Personal Info for Monitoring</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/vaccines/monitoring/info/dolorem"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

let body = {
    "dose": 1
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTapi-doh-vaccines-monitoring-info--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-doh-vaccines-monitoring-info--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-doh-vaccines-monitoring-info--id-"></code></pre>
</div>
<div id="execution-error-POSTapi-doh-vaccines-monitoring-info--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-doh-vaccines-monitoring-info--id-"></code></pre>
</div>
<form id="form-POSTapi-doh-vaccines-monitoring-info--id-" data-method="POST"
      data-path="api/doh/vaccines/monitoring/info/{id}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-doh-vaccines-monitoring-info--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-doh-vaccines-monitoring-info--id-"
                    onclick="tryItOut('POSTapi-doh-vaccines-monitoring-info--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-doh-vaccines-monitoring-info--id-"
                    onclick="cancelTryOut('POSTapi-doh-vaccines-monitoring-info--id-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-doh-vaccines-monitoring-info--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/doh/vaccines/monitoring/info/{id}</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-doh-vaccines-monitoring-info--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-doh-vaccines-monitoring-info--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-doh-vaccines-monitoring-info--id-" data-component="url" required  hidden>
<br>
<p>The ID of the info.</p>            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>dose</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="dose" data-endpoint="POSTapi-doh-vaccines-monitoring-info--id-" data-component="body" required  hidden>
<br>
        </p>
    
    </form>

        <h1 id="authentication">Authentication</h1>
    <p>
        
    </p>

            <h2 id="authentication-POSTapi-login">Login</h2>

<p>
</p>

<p>Login using username and password</p>

<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/login"
);

let headers = {
    "Accept": "application/json",
};

let body = {
    "username": "eius",
    "password": "nihil"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"></code></pre>
</div>
<div id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login"></code></pre>
</div>
<form id="form-POSTapi-login" data-method="POST"
      data-path="api/login"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-login"
                    onclick="tryItOut('POSTapi-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-login"
                    onclick="cancelTryOut('POSTapi-login');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-login" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/login</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>username</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="username" data-endpoint="POSTapi-login" data-component="body" required  hidden>
<br>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password" data-endpoint="POSTapi-login" data-component="body" required  hidden>
<br>
        </p>
    
    </form>

            <h2 id="authentication-POSTapi-logout">Logout</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Logout user</p>

<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/logout"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTapi-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-logout"></code></pre>
</div>
<div id="execution-error-POSTapi-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-logout"></code></pre>
</div>
<form id="form-POSTapi-logout" data-method="POST"
      data-path="api/logout"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-logout"
                    onclick="tryItOut('POSTapi-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-logout"
                    onclick="cancelTryOut('POSTapi-logout');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-logout" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/logout</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-logout" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-logout"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="authentication-POSTapi-authenticate">Testing</h2>

<p>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/authenticate"
);

let headers = {
    "Accept": "application/json",
};

let body = {
    "name": "quos"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTapi-authenticate" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-authenticate"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-authenticate"></code></pre>
</div>
<div id="execution-error-POSTapi-authenticate" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-authenticate"></code></pre>
</div>
<form id="form-POSTapi-authenticate" data-method="POST"
      data-path="api/authenticate"
      data-authed="0"
      data-hasfiles=""
      data-headers='{"Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-authenticate', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-authenticate"
                    onclick="tryItOut('POSTapi-authenticate');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-authenticate"
                    onclick="cancelTryOut('POSTapi-authenticate');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-authenticate" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/authenticate</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-authenticate" data-component="body"  hidden>
<br>
        </p>
    
    </form>

        <h1 id="inoculation">Inoculation</h1>
    <p>
        
    </p>

            <h2 id="inoculation-POSTapi-doh-vaccines-inoculation-info--id-">Personal Info for Inoculation

Returns 200 if patient has been screened.
Returns selected dose vital signs along with inoculation and diluent data
Returns 406 if patient is not yet screened</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/vaccines/inoculation/info/aspernatur"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

let body = {
    "dose": 1
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTapi-doh-vaccines-inoculation-info--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-doh-vaccines-inoculation-info--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-doh-vaccines-inoculation-info--id-"></code></pre>
</div>
<div id="execution-error-POSTapi-doh-vaccines-inoculation-info--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-doh-vaccines-inoculation-info--id-"></code></pre>
</div>
<form id="form-POSTapi-doh-vaccines-inoculation-info--id-" data-method="POST"
      data-path="api/doh/vaccines/inoculation/info/{id}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-doh-vaccines-inoculation-info--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-doh-vaccines-inoculation-info--id-"
                    onclick="tryItOut('POSTapi-doh-vaccines-inoculation-info--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-doh-vaccines-inoculation-info--id-"
                    onclick="cancelTryOut('POSTapi-doh-vaccines-inoculation-info--id-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-doh-vaccines-inoculation-info--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/doh/vaccines/inoculation/info/{id}</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-doh-vaccines-inoculation-info--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-doh-vaccines-inoculation-info--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-doh-vaccines-inoculation-info--id-" data-component="url" required  hidden>
<br>
<p>The ID of the info.</p>            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>dose</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="dose" data-endpoint="POSTapi-doh-vaccines-inoculation-info--id-" data-component="body" required  hidden>
<br>
        </p>
    
    </form>

            <h2 id="inoculation-POSTapi-doh-vaccines-inoculation-update">Update inoculation information</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/vaccines/inoculation/update"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

let body = {
    "id": 2,
    "brand_name": 10,
    "date_of_vaccination": "iusto",
    "time_of_vaccination": "rerum",
    "site_of_injection": "aliquam",
    "lot_number": "quidem",
    "batch_number": "ipsa",
    "vaccination_facility": 2,
    "user_id": 10,
    "encoder_user_id": 15,
    "next_vaccination": "magni",
    "dose": 4,
    "diluent": "veritatis",
    "date_of_reconstitution": "quia",
    "time_of_reconstitution": "qui",
    "diluent_lot_number": 17,
    "diluent_batch_number": 3
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTapi-doh-vaccines-inoculation-update" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-doh-vaccines-inoculation-update"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-doh-vaccines-inoculation-update"></code></pre>
</div>
<div id="execution-error-POSTapi-doh-vaccines-inoculation-update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-doh-vaccines-inoculation-update"></code></pre>
</div>
<form id="form-POSTapi-doh-vaccines-inoculation-update" data-method="POST"
      data-path="api/doh/vaccines/inoculation/update"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-doh-vaccines-inoculation-update', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-doh-vaccines-inoculation-update"
                    onclick="tryItOut('POSTapi-doh-vaccines-inoculation-update');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-doh-vaccines-inoculation-update"
                    onclick="cancelTryOut('POSTapi-doh-vaccines-inoculation-update');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-doh-vaccines-inoculation-update" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/doh/vaccines/inoculation/update</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-doh-vaccines-inoculation-update" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-doh-vaccines-inoculation-update"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="POSTapi-doh-vaccines-inoculation-update" data-component="body" required  hidden>
<br>
<p>This is dosage id not qr pass id.</p>        </p>
                <p>
            <b><code>brand_name</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="brand_name" data-endpoint="POSTapi-doh-vaccines-inoculation-update" data-component="body" required  hidden>
<br>
        </p>
                <p>
            <b><code>date_of_vaccination</code></b>&nbsp;&nbsp;<small>date</small>  &nbsp;
<input type="text" name="date_of_vaccination" data-endpoint="POSTapi-doh-vaccines-inoculation-update" data-component="body" required  hidden>
<br>
        </p>
                <p>
            <b><code>time_of_vaccination</code></b>&nbsp;&nbsp;<small>time</small>  &nbsp;
<input type="text" name="time_of_vaccination" data-endpoint="POSTapi-doh-vaccines-inoculation-update" data-component="body" required  hidden>
<br>
        </p>
                <p>
            <b><code>site_of_injection</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="site_of_injection" data-endpoint="POSTapi-doh-vaccines-inoculation-update" data-component="body" required  hidden>
<br>
        </p>
                <p>
            <b><code>lot_number</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="lot_number" data-endpoint="POSTapi-doh-vaccines-inoculation-update" data-component="body" required  hidden>
<br>
        </p>
                <p>
            <b><code>batch_number</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="batch_number" data-endpoint="POSTapi-doh-vaccines-inoculation-update" data-component="body" required  hidden>
<br>
        </p>
                <p>
            <b><code>vaccination_facility</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="vaccination_facility" data-endpoint="POSTapi-doh-vaccines-inoculation-update" data-component="body" required  hidden>
<br>
        </p>
                <p>
            <b><code>user_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="user_id" data-endpoint="POSTapi-doh-vaccines-inoculation-update" data-component="body" required  hidden>
<br>
        </p>
                <p>
            <b><code>encoder_user_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="encoder_user_id" data-endpoint="POSTapi-doh-vaccines-inoculation-update" data-component="body" required  hidden>
<br>
        </p>
                <p>
            <b><code>next_vaccination</code></b>&nbsp;&nbsp;<small>date</small>  &nbsp;
<input type="text" name="next_vaccination" data-endpoint="POSTapi-doh-vaccines-inoculation-update" data-component="body" required  hidden>
<br>
        </p>
                <p>
            <b><code>dose</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="dose" data-endpoint="POSTapi-doh-vaccines-inoculation-update" data-component="body" required  hidden>
<br>
        </p>
                <p>
            <b><code>diluent</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="diluent" data-endpoint="POSTapi-doh-vaccines-inoculation-update" data-component="body" required  hidden>
<br>
        </p>
                <p>
            <b><code>date_of_reconstitution</code></b>&nbsp;&nbsp;<small>date</small>  &nbsp;
<input type="text" name="date_of_reconstitution" data-endpoint="POSTapi-doh-vaccines-inoculation-update" data-component="body" required  hidden>
<br>
        </p>
                <p>
            <b><code>time_of_reconstitution</code></b>&nbsp;&nbsp;<small>time</small>  &nbsp;
<input type="text" name="time_of_reconstitution" data-endpoint="POSTapi-doh-vaccines-inoculation-update" data-component="body" required  hidden>
<br>
        </p>
                <p>
            <b><code>diluent_lot_number</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="diluent_lot_number" data-endpoint="POSTapi-doh-vaccines-inoculation-update" data-component="body" required  hidden>
<br>
        </p>
                <p>
            <b><code>diluent_batch_number</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="diluent_batch_number" data-endpoint="POSTapi-doh-vaccines-inoculation-update" data-component="body" required  hidden>
<br>
        </p>
    
    </form>

        <h1 id="screening">Screening</h1>
    <p>
        
    </p>

            <h2 id="screening-POSTapi-doh-vaccines-screening-info--id-">Personal Info for Screening</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/vaccines/screening/info/est"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

let body = {
    "dose": 1
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTapi-doh-vaccines-screening-info--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-doh-vaccines-screening-info--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-doh-vaccines-screening-info--id-"></code></pre>
</div>
<div id="execution-error-POSTapi-doh-vaccines-screening-info--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-doh-vaccines-screening-info--id-"></code></pre>
</div>
<form id="form-POSTapi-doh-vaccines-screening-info--id-" data-method="POST"
      data-path="api/doh/vaccines/screening/info/{id}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-doh-vaccines-screening-info--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-doh-vaccines-screening-info--id-"
                    onclick="tryItOut('POSTapi-doh-vaccines-screening-info--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-doh-vaccines-screening-info--id-"
                    onclick="cancelTryOut('POSTapi-doh-vaccines-screening-info--id-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-doh-vaccines-screening-info--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/doh/vaccines/screening/info/{id}</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-doh-vaccines-screening-info--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-doh-vaccines-screening-info--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-doh-vaccines-screening-info--id-" data-component="url" required  hidden>
<br>
<p>The ID of the info.</p>            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>dose</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="dose" data-endpoint="POSTapi-doh-vaccines-screening-info--id-" data-component="body" required  hidden>
<br>
        </p>
    
    </form>

            <h2 id="screening-POSTapi-doh-vaccines-screening-update">Update screening per dose</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/vaccines/screening/update"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

let body = {
    "id": "reiciendis",
    "dosage_id": 17,
    "dose": 14,
    "screened": false,
    "vitals": [
        {
            "dose": 14
        },
        {
            "dose": 14
        }
    ],
    "pre_assessment": {
        "dose": 16,
        "dosage_id": 13,
        "consent": "ullam",
        "user_id": 9,
        "reason": "magni",
        "screened": true,
        "assessments": [
            {
                "key": 8,
                "description": "totam",
                "value": false
            },
            {
                "key": 8,
                "description": "totam"
            }
        ]
    },
    "dels": [
        5,
        1
    ]
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTapi-doh-vaccines-screening-update" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-doh-vaccines-screening-update"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-doh-vaccines-screening-update"></code></pre>
</div>
<div id="execution-error-POSTapi-doh-vaccines-screening-update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-doh-vaccines-screening-update"></code></pre>
</div>
<form id="form-POSTapi-doh-vaccines-screening-update" data-method="POST"
      data-path="api/doh/vaccines/screening/update"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-doh-vaccines-screening-update', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-doh-vaccines-screening-update"
                    onclick="tryItOut('POSTapi-doh-vaccines-screening-update');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-doh-vaccines-screening-update"
                    onclick="cancelTryOut('POSTapi-doh-vaccines-screening-update');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-doh-vaccines-screening-update" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/doh/vaccines/screening/update</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-doh-vaccines-screening-update" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-doh-vaccines-screening-update"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="POSTapi-doh-vaccines-screening-update" data-component="body" required  hidden>
<br>
        </p>
                <p>
            <b><code>dosage_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="dosage_id" data-endpoint="POSTapi-doh-vaccines-screening-update" data-component="body" required  hidden>
<br>
        </p>
                <p>
            <b><code>dose</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="dose" data-endpoint="POSTapi-doh-vaccines-screening-update" data-component="body" required  hidden>
<br>
        </p>
                <p>
            <b><code>screened</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-doh-vaccines-screening-update" hidden><input type="radio" name="screened" value="true" data-endpoint="POSTapi-doh-vaccines-screening-update" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-doh-vaccines-screening-update" hidden><input type="radio" name="screened" value="false" data-endpoint="POSTapi-doh-vaccines-screening-update" data-component="body" ><code>false</code></label>
<br>
        </p>
                <p>
        <details>
            <summary>
                <b><code>vitals</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>
            </summary>
            <br>
                                                <p>
                        <b><code>vitals[].dose</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="vitals.0.dose" data-endpoint="POSTapi-doh-vaccines-screening-update" data-component="body"  hidden>
<br>
                    </p>
                                    </details>
        </p>
                <p>
        <details>
            <summary>
                <b><code>pre_assessment</code></b>&nbsp;&nbsp;<small>object</small>  &nbsp;
<br>
            </summary>
            <br>
                                                <p>
                        <b><code>pre_assessment.dose</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="pre_assessment.dose" data-endpoint="POSTapi-doh-vaccines-screening-update" data-component="body" required  hidden>
<br>
                    </p>
                                                                <p>
                        <b><code>pre_assessment.dosage_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="pre_assessment.dosage_id" data-endpoint="POSTapi-doh-vaccines-screening-update" data-component="body" required  hidden>
<br>
                    </p>
                                                                <p>
                        <b><code>pre_assessment.consent</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="pre_assessment.consent" data-endpoint="POSTapi-doh-vaccines-screening-update" data-component="body" required  hidden>
<br>
                    </p>
                                                                <p>
                        <b><code>pre_assessment.user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="pre_assessment.user_id" data-endpoint="POSTapi-doh-vaccines-screening-update" data-component="body"  hidden>
<br>
                    </p>
                                                                <p>
                        <b><code>pre_assessment.reason</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="pre_assessment.reason" data-endpoint="POSTapi-doh-vaccines-screening-update" data-component="body" required  hidden>
<br>
                    </p>
                                                                <p>
                        <b><code>pre_assessment.screened</code></b>&nbsp;&nbsp;<small>boolean</small>  &nbsp;
<label data-endpoint="POSTapi-doh-vaccines-screening-update" hidden><input type="radio" name="pre_assessment.screened" value="true" data-endpoint="POSTapi-doh-vaccines-screening-update" data-component="body" required ><code>true</code></label>
<label data-endpoint="POSTapi-doh-vaccines-screening-update" hidden><input type="radio" name="pre_assessment.screened" value="false" data-endpoint="POSTapi-doh-vaccines-screening-update" data-component="body" required ><code>false</code></label>
<br>
                    </p>
                                                                <p>
        <details>
            <summary>
                <b><code>pre_assessment.assessments</code></b>&nbsp;&nbsp;<small>object[]</small>     <i>optional</i> &nbsp;
<br>
            </summary>
            <br>
                                                <p>
                        <b><code>pre_assessment.assessments[].key</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="pre_assessment.assessments.0.key" data-endpoint="POSTapi-doh-vaccines-screening-update" data-component="body"  hidden>
<br>
                    </p>
                                                                <p>
                        <b><code>pre_assessment.assessments[].description</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pre_assessment.assessments.0.description" data-endpoint="POSTapi-doh-vaccines-screening-update" data-component="body"  hidden>
<br>
                    </p>
                                                                <p>
                        <b><code>pre_assessment.assessments[].value</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
<label data-endpoint="POSTapi-doh-vaccines-screening-update" hidden><input type="radio" name="pre_assessment.assessments.0.value" value="true" data-endpoint="POSTapi-doh-vaccines-screening-update" data-component="body" ><code>true</code></label>
<label data-endpoint="POSTapi-doh-vaccines-screening-update" hidden><input type="radio" name="pre_assessment.assessments.0.value" value="false" data-endpoint="POSTapi-doh-vaccines-screening-update" data-component="body" ><code>false</code></label>
<br>
                    </p>
                                    </details>
        </p>
    
                                    </details>
        </p>
                <p>
            <b><code>dels</code></b>&nbsp;&nbsp;<small>integer[]</small>     <i>optional</i> &nbsp;
<input type="number" name="dels.0" data-endpoint="POSTapi-doh-vaccines-screening-update" data-component="body"  hidden>
<input type="number" name="dels.1" data-endpoint="POSTapi-doh-vaccines-screening-update" data-component="body" hidden>
<br>
        </p>
    
    </form>

        <h1 id="uncategorized">Uncategorized</h1>
    <p>
        
    </p>

            <h2 id="uncategorized-POSTapi-change-password">Handle the incoming request.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/change/password"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

let body = {
    "currentPassword": "et",
    "newPassword": "smve",
    "confirmNewPassword": "ellnhh"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTapi-change-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-change-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-change-password"></code></pre>
</div>
<div id="execution-error-POSTapi-change-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-change-password"></code></pre>
</div>
<form id="form-POSTapi-change-password" data-method="POST"
      data-path="api/change/password"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-change-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-change-password"
                    onclick="tryItOut('POSTapi-change-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-change-password"
                    onclick="cancelTryOut('POSTapi-change-password');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-change-password" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/change/password</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-change-password" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-change-password"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>currentPassword</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="currentPassword" data-endpoint="POSTapi-change-password" data-component="body" required  hidden>
<br>
        </p>
                <p>
            <b><code>newPassword</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="newPassword" data-endpoint="POSTapi-change-password" data-component="body" required  hidden>
<br>
<p>validation.min.</p>        </p>
                <p>
            <b><code>confirmNewPassword</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="confirmNewPassword" data-endpoint="POSTapi-change-password" data-component="body" required  hidden>
<br>
<p>validation.same validation.min.</p>        </p>
    
    </form>

            <h2 id="uncategorized-GETapi-surveys">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/surveys"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-surveys" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-surveys"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-surveys"></code></pre>
</div>
<div id="execution-error-GETapi-surveys" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-surveys"></code></pre>
</div>
<form id="form-GETapi-surveys" data-method="GET"
      data-path="api/surveys"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-surveys', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-surveys"
                    onclick="tryItOut('GETapi-surveys');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-surveys"
                    onclick="cancelTryOut('GETapi-surveys');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-surveys" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/surveys</code></b>
        </p>
                <p>
            <label id="auth-GETapi-surveys" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-surveys"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="uncategorized-POSTapi-survey">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/survey"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTapi-survey" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-survey"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-survey"></code></pre>
</div>
<div id="execution-error-POSTapi-survey" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-survey"></code></pre>
</div>
<form id="form-POSTapi-survey" data-method="POST"
      data-path="api/survey"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-survey', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-survey"
                    onclick="tryItOut('POSTapi-survey');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-survey"
                    onclick="cancelTryOut('POSTapi-survey');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-survey" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/survey</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-survey" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-survey"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="uncategorized-GETapi-survey--survey-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/survey/19"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-survey--survey-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-survey--survey-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-survey--survey-"></code></pre>
</div>
<div id="execution-error-GETapi-survey--survey-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-survey--survey-"></code></pre>
</div>
<form id="form-GETapi-survey--survey-" data-method="GET"
      data-path="api/survey/{survey}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-survey--survey-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-survey--survey-"
                    onclick="tryItOut('GETapi-survey--survey-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-survey--survey-"
                    onclick="cancelTryOut('GETapi-survey--survey-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-survey--survey-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/survey/{survey}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-survey--survey-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-survey--survey-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>survey</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="survey" data-endpoint="GETapi-survey--survey-" data-component="url" required  hidden>
<br>
            </p>
                    </form>

            <h2 id="uncategorized-PUTapi-survey--survey-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/survey/16"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-PUTapi-survey--survey-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-survey--survey-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-survey--survey-"></code></pre>
</div>
<div id="execution-error-PUTapi-survey--survey-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-survey--survey-"></code></pre>
</div>
<form id="form-PUTapi-survey--survey-" data-method="PUT"
      data-path="api/survey/{survey}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-survey--survey-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-survey--survey-"
                    onclick="tryItOut('PUTapi-survey--survey-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-survey--survey-"
                    onclick="cancelTryOut('PUTapi-survey--survey-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-survey--survey-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/survey/{survey}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/survey/{survey}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-survey--survey-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-survey--survey-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>survey</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="survey" data-endpoint="PUTapi-survey--survey-" data-component="url" required  hidden>
<br>
            </p>
                    </form>

            <h2 id="uncategorized-DELETEapi-survey--survey-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/survey/1"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-DELETEapi-survey--survey-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-survey--survey-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-survey--survey-"></code></pre>
</div>
<div id="execution-error-DELETEapi-survey--survey-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-survey--survey-"></code></pre>
</div>
<form id="form-DELETEapi-survey--survey-" data-method="DELETE"
      data-path="api/survey/{survey}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-survey--survey-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-survey--survey-"
                    onclick="tryItOut('DELETEapi-survey--survey-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-survey--survey-"
                    onclick="cancelTryOut('DELETEapi-survey--survey-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-survey--survey-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/survey/{survey}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-survey--survey-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-survey--survey-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>survey</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="survey" data-endpoint="DELETEapi-survey--survey-" data-component="url" required  hidden>
<br>
            </p>
                    </form>

            <h2 id="uncategorized-GETapi-users">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/users"
);

let params = {
    "search": "est",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users"></code></pre>
</div>
<div id="execution-error-GETapi-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users"></code></pre>
</div>
<form id="form-GETapi-users" data-method="GET"
      data-path="api/users"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-users"
                    onclick="tryItOut('GETapi-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-users"
                    onclick="cancelTryOut('GETapi-users');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-users" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/users</code></b>
        </p>
                <p>
            <label id="auth-GETapi-users" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-users"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>search</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="search" data-endpoint="GETapi-users" data-component="query"  hidden>
<br>
            </p>
                </form>

            <h2 id="uncategorized-POSTapi-user">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/user"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

let body = {
    "firstname": "aliquam",
    "lastname": "aliquam",
    "username": "inventore",
    "password": "qui",
    "group_id": 17,
    "profession": "odit",
    "prc_number": "rerum"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTapi-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-user"></code></pre>
</div>
<div id="execution-error-POSTapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-user"></code></pre>
</div>
<form id="form-POSTapi-user" data-method="POST"
      data-path="api/user"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-user"
                    onclick="tryItOut('POSTapi-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-user"
                    onclick="cancelTryOut('POSTapi-user');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-user" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/user</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-user" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-user"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>firstname</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="firstname" data-endpoint="POSTapi-user" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>lastname</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="lastname" data-endpoint="POSTapi-user" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>username</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="username" data-endpoint="POSTapi-user" data-component="body"  hidden>
<br>
<p>'email' =&gt; ['string','email','max:191','unique:users'],.</p>        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="password" data-endpoint="POSTapi-user" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>group_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="group_id" data-endpoint="POSTapi-user" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>profession</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="profession" data-endpoint="POSTapi-user" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>prc_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="prc_number" data-endpoint="POSTapi-user" data-component="body"  hidden>
<br>
        </p>
    
    </form>

            <h2 id="uncategorized-GETapi-user--user-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/user/17"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-user--user-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user--user-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user--user-"></code></pre>
</div>
<div id="execution-error-GETapi-user--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user--user-"></code></pre>
</div>
<form id="form-GETapi-user--user-" data-method="GET"
      data-path="api/user/{user}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user--user-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user--user-"
                    onclick="tryItOut('GETapi-user--user-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user--user-"
                    onclick="cancelTryOut('GETapi-user--user-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user--user-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user/{user}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-user--user-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-user--user-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>user</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="user" data-endpoint="GETapi-user--user-" data-component="url" required  hidden>
<br>
            </p>
                    </form>

            <h2 id="uncategorized-PUTapi-user--user-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/user/15"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

let body = {
    "firstname": "minima",
    "lastname": "et",
    "username": "maiores",
    "group_id": 9,
    "profession": "iure",
    "prc_number": "non"
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-PUTapi-user--user-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-user--user-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-user--user-"></code></pre>
</div>
<div id="execution-error-PUTapi-user--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-user--user-"></code></pre>
</div>
<form id="form-PUTapi-user--user-" data-method="PUT"
      data-path="api/user/{user}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-user--user-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-user--user-"
                    onclick="tryItOut('PUTapi-user--user-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-user--user-"
                    onclick="cancelTryOut('PUTapi-user--user-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-user--user-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/user/{user}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/user/{user}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-user--user-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-user--user-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>user</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="user" data-endpoint="PUTapi-user--user-" data-component="url" required  hidden>
<br>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>firstname</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="firstname" data-endpoint="PUTapi-user--user-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>lastname</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="lastname" data-endpoint="PUTapi-user--user-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>username</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="username" data-endpoint="PUTapi-user--user-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>group_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="group_id" data-endpoint="PUTapi-user--user-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>profession</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="profession" data-endpoint="PUTapi-user--user-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>prc_number</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="prc_number" data-endpoint="PUTapi-user--user-" data-component="body"  hidden>
<br>
        </p>
    
    </form>

            <h2 id="uncategorized-DELETEapi-user--user-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/user/7"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-DELETEapi-user--user-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-user--user-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-user--user-"></code></pre>
</div>
<div id="execution-error-DELETEapi-user--user-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-user--user-"></code></pre>
</div>
<form id="form-DELETEapi-user--user-" data-method="DELETE"
      data-path="api/user/{user}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-user--user-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-user--user-"
                    onclick="tryItOut('DELETEapi-user--user-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-user--user-"
                    onclick="cancelTryOut('DELETEapi-user--user-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-user--user-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/user/{user}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-user--user-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-user--user-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>user</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="user" data-endpoint="DELETEapi-user--user-" data-component="url" required  hidden>
<br>
            </p>
                    </form>

            <h2 id="uncategorized-GETapi-hospitals">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/hospitals"
);

let params = {
    "search": "corporis",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-hospitals" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-hospitals"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-hospitals"></code></pre>
</div>
<div id="execution-error-GETapi-hospitals" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-hospitals"></code></pre>
</div>
<form id="form-GETapi-hospitals" data-method="GET"
      data-path="api/hospitals"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-hospitals', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-hospitals"
                    onclick="tryItOut('GETapi-hospitals');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-hospitals"
                    onclick="cancelTryOut('GETapi-hospitals');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-hospitals" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/hospitals</code></b>
        </p>
                <p>
            <label id="auth-GETapi-hospitals" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-hospitals"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>search</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="search" data-endpoint="GETapi-hospitals" data-component="query"  hidden>
<br>
            </p>
                </form>

            <h2 id="uncategorized-POSTapi-hospital">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/hospital"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

let body = {
    "description": "iste",
    "slots": 10,
    "cbcr_id": "et"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTapi-hospital" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-hospital"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-hospital"></code></pre>
</div>
<div id="execution-error-POSTapi-hospital" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-hospital"></code></pre>
</div>
<form id="form-POSTapi-hospital" data-method="POST"
      data-path="api/hospital"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-hospital', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-hospital"
                    onclick="tryItOut('POSTapi-hospital');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-hospital"
                    onclick="cancelTryOut('POSTapi-hospital');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-hospital" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/hospital</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-hospital" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-hospital"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>description</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="description" data-endpoint="POSTapi-hospital" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>slots</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="slots" data-endpoint="POSTapi-hospital" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>cbcr_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="cbcr_id" data-endpoint="POSTapi-hospital" data-component="body"  hidden>
<br>
        </p>
    
    </form>

            <h2 id="uncategorized-GETapi-hospital--hospital-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/hospital/13"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-hospital--hospital-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-hospital--hospital-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-hospital--hospital-"></code></pre>
</div>
<div id="execution-error-GETapi-hospital--hospital-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-hospital--hospital-"></code></pre>
</div>
<form id="form-GETapi-hospital--hospital-" data-method="GET"
      data-path="api/hospital/{hospital}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-hospital--hospital-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-hospital--hospital-"
                    onclick="tryItOut('GETapi-hospital--hospital-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-hospital--hospital-"
                    onclick="cancelTryOut('GETapi-hospital--hospital-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-hospital--hospital-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/hospital/{hospital}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-hospital--hospital-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-hospital--hospital-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>hospital</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="hospital" data-endpoint="GETapi-hospital--hospital-" data-component="url" required  hidden>
<br>
            </p>
                    </form>

            <h2 id="uncategorized-PUTapi-hospital--hospital-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/hospital/5"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

let body = {
    "description": "numquam",
    "slots": 14,
    "cbcr_id": "rerum"
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-PUTapi-hospital--hospital-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-hospital--hospital-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-hospital--hospital-"></code></pre>
</div>
<div id="execution-error-PUTapi-hospital--hospital-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-hospital--hospital-"></code></pre>
</div>
<form id="form-PUTapi-hospital--hospital-" data-method="PUT"
      data-path="api/hospital/{hospital}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-hospital--hospital-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-hospital--hospital-"
                    onclick="tryItOut('PUTapi-hospital--hospital-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-hospital--hospital-"
                    onclick="cancelTryOut('PUTapi-hospital--hospital-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-hospital--hospital-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/hospital/{hospital}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/hospital/{hospital}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-hospital--hospital-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-hospital--hospital-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>hospital</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="hospital" data-endpoint="PUTapi-hospital--hospital-" data-component="url" required  hidden>
<br>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>description</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="description" data-endpoint="PUTapi-hospital--hospital-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>slots</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="slots" data-endpoint="PUTapi-hospital--hospital-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>cbcr_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="cbcr_id" data-endpoint="PUTapi-hospital--hospital-" data-component="body"  hidden>
<br>
        </p>
    
    </form>

            <h2 id="uncategorized-DELETEapi-hospital--hospital-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/hospital/2"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-DELETEapi-hospital--hospital-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-hospital--hospital-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-hospital--hospital-"></code></pre>
</div>
<div id="execution-error-DELETEapi-hospital--hospital-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-hospital--hospital-"></code></pre>
</div>
<form id="form-DELETEapi-hospital--hospital-" data-method="DELETE"
      data-path="api/hospital/{hospital}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-hospital--hospital-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-hospital--hospital-"
                    onclick="tryItOut('DELETEapi-hospital--hospital-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-hospital--hospital-"
                    onclick="cancelTryOut('DELETEapi-hospital--hospital-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-hospital--hospital-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/hospital/{hospital}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-hospital--hospital-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-hospital--hospital-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>hospital</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="hospital" data-endpoint="DELETEapi-hospital--hospital-" data-component="url" required  hidden>
<br>
            </p>
                    </form>

            <h2 id="uncategorized-GETapi-napanam-check-registration--id-">api/napanam/check/registration/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/napanam/check/registration/12"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-napanam-check-registration--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-napanam-check-registration--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-napanam-check-registration--id-"></code></pre>
</div>
<div id="execution-error-GETapi-napanam-check-registration--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-napanam-check-registration--id-"></code></pre>
</div>
<form id="form-GETapi-napanam-check-registration--id-" data-method="GET"
      data-path="api/napanam/check/registration/{id}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-napanam-check-registration--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-napanam-check-registration--id-"
                    onclick="tryItOut('GETapi-napanam-check-registration--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-napanam-check-registration--id-"
                    onclick="cancelTryOut('GETapi-napanam-check-registration--id-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-napanam-check-registration--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/napanam/check/registration/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-napanam-check-registration--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-napanam-check-registration--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETapi-napanam-check-registration--id-" data-component="url" required  hidden>
<br>
<p>The ID of the registration.</p>            </p>
                    </form>

            <h2 id="uncategorized-GETapi-napanam-check-registration--id---birthday-">api/napanam/check/registration/{id}/{birthday}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/napanam/check/registration/15/minus"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-napanam-check-registration--id---birthday-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-napanam-check-registration--id---birthday-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-napanam-check-registration--id---birthday-"></code></pre>
</div>
<div id="execution-error-GETapi-napanam-check-registration--id---birthday-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-napanam-check-registration--id---birthday-"></code></pre>
</div>
<form id="form-GETapi-napanam-check-registration--id---birthday-" data-method="GET"
      data-path="api/napanam/check/registration/{id}/{birthday}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-napanam-check-registration--id---birthday-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-napanam-check-registration--id---birthday-"
                    onclick="tryItOut('GETapi-napanam-check-registration--id---birthday-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-napanam-check-registration--id---birthday-"
                    onclick="cancelTryOut('GETapi-napanam-check-registration--id---birthday-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-napanam-check-registration--id---birthday-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/napanam/check/registration/{id}/{birthday}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-napanam-check-registration--id---birthday-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-napanam-check-registration--id---birthday-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETapi-napanam-check-registration--id---birthday-" data-component="url" required  hidden>
<br>
<p>The ID of the registration.</p>            </p>
                    <p>
                <b><code>birthday</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="birthday" data-endpoint="GETapi-napanam-check-registration--id---birthday-" data-component="url" required  hidden>
<br>
            </p>
                    </form>

            <h2 id="uncategorized-GETapi-napanam-check-registrationID--id-">api/napanam/check/registrationID/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/napanam/check/registrationID/illo"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-napanam-check-registrationID--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-napanam-check-registrationID--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-napanam-check-registrationID--id-"></code></pre>
</div>
<div id="execution-error-GETapi-napanam-check-registrationID--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-napanam-check-registrationID--id-"></code></pre>
</div>
<form id="form-GETapi-napanam-check-registrationID--id-" data-method="GET"
      data-path="api/napanam/check/registrationID/{id}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-napanam-check-registrationID--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-napanam-check-registrationID--id-"
                    onclick="tryItOut('GETapi-napanam-check-registrationID--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-napanam-check-registrationID--id-"
                    onclick="cancelTryOut('GETapi-napanam-check-registrationID--id-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-napanam-check-registrationID--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/napanam/check/registrationID/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-napanam-check-registrationID--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-napanam-check-registrationID--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-napanam-check-registrationID--id-" data-component="url" required  hidden>
<br>
<p>The ID of the registrationID.</p>            </p>
                    </form>

            <h2 id="uncategorized-GETapi-doh-selections">Handle the incoming request.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/selections"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-doh-selections" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doh-selections"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doh-selections"></code></pre>
</div>
<div id="execution-error-GETapi-doh-selections" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doh-selections"></code></pre>
</div>
<form id="form-GETapi-doh-selections" data-method="GET"
      data-path="api/doh/selections"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doh-selections', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doh-selections"
                    onclick="tryItOut('GETapi-doh-selections');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doh-selections"
                    onclick="cancelTryOut('GETapi-doh-selections');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doh-selections" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doh/selections</code></b>
        </p>
                <p>
            <label id="auth-GETapi-doh-selections" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-doh-selections"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="uncategorized-GETapi-doh-selections-addresses">api/doh/selections/addresses</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/selections/addresses"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-doh-selections-addresses" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doh-selections-addresses"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doh-selections-addresses"></code></pre>
</div>
<div id="execution-error-GETapi-doh-selections-addresses" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doh-selections-addresses"></code></pre>
</div>
<form id="form-GETapi-doh-selections-addresses" data-method="GET"
      data-path="api/doh/selections/addresses"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doh-selections-addresses', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doh-selections-addresses"
                    onclick="tryItOut('GETapi-doh-selections-addresses');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doh-selections-addresses"
                    onclick="cancelTryOut('GETapi-doh-selections-addresses');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doh-selections-addresses" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doh/selections/addresses</code></b>
        </p>
                <p>
            <label id="auth-GETapi-doh-selections-addresses" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-doh-selections-addresses"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="uncategorized-GETapi-doh-selections-brands">api/doh/selections/brands</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/selections/brands"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-doh-selections-brands" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doh-selections-brands"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doh-selections-brands"></code></pre>
</div>
<div id="execution-error-GETapi-doh-selections-brands" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doh-selections-brands"></code></pre>
</div>
<form id="form-GETapi-doh-selections-brands" data-method="GET"
      data-path="api/doh/selections/brands"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doh-selections-brands', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doh-selections-brands"
                    onclick="tryItOut('GETapi-doh-selections-brands');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doh-selections-brands"
                    onclick="cancelTryOut('GETapi-doh-selections-brands');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doh-selections-brands" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doh/selections/brands</code></b>
        </p>
                <p>
            <label id="auth-GETapi-doh-selections-brands" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-doh-selections-brands"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="uncategorized-GETapi-doh-selections-vaccination-sessions">api/doh/selections/vaccination/sessions</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/selections/vaccination/sessions"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-doh-selections-vaccination-sessions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doh-selections-vaccination-sessions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doh-selections-vaccination-sessions"></code></pre>
</div>
<div id="execution-error-GETapi-doh-selections-vaccination-sessions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doh-selections-vaccination-sessions"></code></pre>
</div>
<form id="form-GETapi-doh-selections-vaccination-sessions" data-method="GET"
      data-path="api/doh/selections/vaccination/sessions"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doh-selections-vaccination-sessions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doh-selections-vaccination-sessions"
                    onclick="tryItOut('GETapi-doh-selections-vaccination-sessions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doh-selections-vaccination-sessions"
                    onclick="cancelTryOut('GETapi-doh-selections-vaccination-sessions');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doh-selections-vaccination-sessions" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doh/selections/vaccination/sessions</code></b>
        </p>
                <p>
            <label id="auth-GETapi-doh-selections-vaccination-sessions" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-doh-selections-vaccination-sessions"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="uncategorized-GETapi-doh-selections-groups">api/doh/selections/groups</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/selections/groups"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-doh-selections-groups" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doh-selections-groups"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doh-selections-groups"></code></pre>
</div>
<div id="execution-error-GETapi-doh-selections-groups" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doh-selections-groups"></code></pre>
</div>
<form id="form-GETapi-doh-selections-groups" data-method="GET"
      data-path="api/doh/selections/groups"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doh-selections-groups', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doh-selections-groups"
                    onclick="tryItOut('GETapi-doh-selections-groups');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doh-selections-groups"
                    onclick="cancelTryOut('GETapi-doh-selections-groups');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doh-selections-groups" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doh/selections/groups</code></b>
        </p>
                <p>
            <label id="auth-GETapi-doh-selections-groups" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-doh-selections-groups"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="uncategorized-GETapi-doh-selections-priority-groups">api/doh/selections/priority/groups</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/selections/priority/groups"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-doh-selections-priority-groups" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doh-selections-priority-groups"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doh-selections-priority-groups"></code></pre>
</div>
<div id="execution-error-GETapi-doh-selections-priority-groups" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doh-selections-priority-groups"></code></pre>
</div>
<form id="form-GETapi-doh-selections-priority-groups" data-method="GET"
      data-path="api/doh/selections/priority/groups"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doh-selections-priority-groups', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doh-selections-priority-groups"
                    onclick="tryItOut('GETapi-doh-selections-priority-groups');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doh-selections-priority-groups"
                    onclick="cancelTryOut('GETapi-doh-selections-priority-groups');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doh-selections-priority-groups" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doh/selections/priority/groups</code></b>
        </p>
                <p>
            <label id="auth-GETapi-doh-selections-priority-groups" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-doh-selections-priority-groups"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="uncategorized-GETapi-doh-selections-vaccine-refusals">api/doh/selections/vaccine/refusals</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/selections/vaccine/refusals"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-doh-selections-vaccine-refusals" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doh-selections-vaccine-refusals"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doh-selections-vaccine-refusals"></code></pre>
</div>
<div id="execution-error-GETapi-doh-selections-vaccine-refusals" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doh-selections-vaccine-refusals"></code></pre>
</div>
<form id="form-GETapi-doh-selections-vaccine-refusals" data-method="GET"
      data-path="api/doh/selections/vaccine/refusals"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doh-selections-vaccine-refusals', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doh-selections-vaccine-refusals"
                    onclick="tryItOut('GETapi-doh-selections-vaccine-refusals');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doh-selections-vaccine-refusals"
                    onclick="cancelTryOut('GETapi-doh-selections-vaccine-refusals');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doh-selections-vaccine-refusals" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doh/selections/vaccine/refusals</code></b>
        </p>
                <p>
            <label id="auth-GETapi-doh-selections-vaccine-refusals" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-doh-selections-vaccine-refusals"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="uncategorized-GETapi-doh-registrations">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/registrations"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-doh-registrations" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doh-registrations"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doh-registrations"></code></pre>
</div>
<div id="execution-error-GETapi-doh-registrations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doh-registrations"></code></pre>
</div>
<form id="form-GETapi-doh-registrations" data-method="GET"
      data-path="api/doh/registrations"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doh-registrations', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doh-registrations"
                    onclick="tryItOut('GETapi-doh-registrations');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doh-registrations"
                    onclick="cancelTryOut('GETapi-doh-registrations');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doh-registrations" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doh/registrations</code></b>
        </p>
                <p>
            <label id="auth-GETapi-doh-registrations" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-doh-registrations"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="uncategorized-POSTapi-doh-registration">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/registration"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

let body = {
    "qr_pass_id": "ea",
    "first_name": "harum",
    "middle_name": "odio",
    "last_name": "rerum",
    "suffix": "quod",
    "birthdate": "id",
    "gender": "et",
    "region": "cum",
    "address": "eius",
    "barangay": "dolorem",
    "town_city": "et",
    "province": "nihil",
    "contact_no": "omnis",
    "category": "autem",
    "category_id": "non",
    "category_id_no": "et",
    "philhealth": "assumenda",
    "pwd_id": "incidunt",
    "indigenous_member": "et",
    "civil_status": "ut",
    "priority_group": "vel",
    "sub_priority_group": "dolorem",
    "occupation": "a",
    "with_allergy": "blanditiis",
    "with_comorbidity": "consequatur",
    "is_registered": "iure",
    "origin": "autem",
    "employer_name": "hic",
    "employer_address": "quia",
    "employer_lgu": "sit"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTapi-doh-registration" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-doh-registration"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-doh-registration"></code></pre>
</div>
<div id="execution-error-POSTapi-doh-registration" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-doh-registration"></code></pre>
</div>
<form id="form-POSTapi-doh-registration" data-method="POST"
      data-path="api/doh/registration"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-doh-registration', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-doh-registration"
                    onclick="tryItOut('POSTapi-doh-registration');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-doh-registration"
                    onclick="cancelTryOut('POSTapi-doh-registration');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-doh-registration" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/doh/registration</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-doh-registration" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-doh-registration"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>qr_pass_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="qr_pass_id" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>first_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="first_name" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>middle_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="middle_name" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>last_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="last_name" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>suffix</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="suffix" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>birthdate</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="birthdate" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>gender</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="gender" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>region</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="region" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>address</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="address" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>barangay</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="barangay" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>town_city</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="town_city" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>province</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="province" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>contact_no</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="contact_no" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>category</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="category" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>category_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="category_id" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>category_id_no</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="category_id_no" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>philhealth</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="philhealth" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>pwd_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pwd_id" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>indigenous_member</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="indigenous_member" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>civil_status</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="civil_status" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>priority_group</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="priority_group" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>sub_priority_group</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="sub_priority_group" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>occupation</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="occupation" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>with_allergy</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="with_allergy" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>with_comorbidity</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="with_comorbidity" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>is_registered</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="is_registered" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>origin</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="origin" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>employer_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="employer_name" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>employer_address</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="employer_address" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>employer_lgu</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="employer_lgu" data-endpoint="POSTapi-doh-registration" data-component="body"  hidden>
<br>
        </p>
    
    </form>

            <h2 id="uncategorized-GETapi-doh-registration--registration-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/registration/8"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-doh-registration--registration-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doh-registration--registration-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doh-registration--registration-"></code></pre>
</div>
<div id="execution-error-GETapi-doh-registration--registration-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doh-registration--registration-"></code></pre>
</div>
<form id="form-GETapi-doh-registration--registration-" data-method="GET"
      data-path="api/doh/registration/{registration}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doh-registration--registration-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doh-registration--registration-"
                    onclick="tryItOut('GETapi-doh-registration--registration-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doh-registration--registration-"
                    onclick="cancelTryOut('GETapi-doh-registration--registration-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doh-registration--registration-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doh/registration/{registration}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-doh-registration--registration-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-doh-registration--registration-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>registration</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="registration" data-endpoint="GETapi-doh-registration--registration-" data-component="url" required  hidden>
<br>
            </p>
                    </form>

            <h2 id="uncategorized-PUTapi-doh-registration--registration-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/registration/1"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

let body = {
    "qr_pass_id": "debitis",
    "first_name": "consectetur",
    "middle_name": "veniam",
    "last_name": "est",
    "suffix": "deserunt",
    "birthdate": "aliquam",
    "gender": "dolor",
    "region": "ullam",
    "address": "et",
    "barangay": "dolor",
    "town_city": "quod",
    "province": "architecto",
    "contact_no": "eos",
    "civil_status": "porro",
    "category": "autem",
    "category_id": "perferendis",
    "category_id_no": "repellendus",
    "philhealth": "veritatis",
    "pwd_id": "ipsa",
    "indigenous_member": "ad",
    "priority_group": "numquam",
    "sub_priority_group": "blanditiis",
    "occupation": "qui",
    "with_allergy": "voluptatem",
    "with_comorbidity": "tempora",
    "is_registered": "quisquam",
    "origin": "enim",
    "employer_name": "ipsum",
    "employer_address": "ut",
    "employer_lgu": "veniam"
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-PUTapi-doh-registration--registration-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-doh-registration--registration-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-doh-registration--registration-"></code></pre>
</div>
<div id="execution-error-PUTapi-doh-registration--registration-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-doh-registration--registration-"></code></pre>
</div>
<form id="form-PUTapi-doh-registration--registration-" data-method="PUT"
      data-path="api/doh/registration/{registration}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-doh-registration--registration-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-doh-registration--registration-"
                    onclick="tryItOut('PUTapi-doh-registration--registration-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-doh-registration--registration-"
                    onclick="cancelTryOut('PUTapi-doh-registration--registration-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-doh-registration--registration-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/doh/registration/{registration}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/doh/registration/{registration}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-doh-registration--registration-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-doh-registration--registration-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>registration</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="registration" data-endpoint="PUTapi-doh-registration--registration-" data-component="url" required  hidden>
<br>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>qr_pass_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="qr_pass_id" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>first_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="first_name" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>middle_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="middle_name" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>last_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="last_name" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>suffix</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="suffix" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>birthdate</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="birthdate" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>gender</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="gender" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>region</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="region" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>address</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="address" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>barangay</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="barangay" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>town_city</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="town_city" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>province</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="province" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>contact_no</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="contact_no" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>civil_status</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="civil_status" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>category</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="category" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>category_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="category_id" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>category_id_no</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="category_id_no" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>philhealth</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="philhealth" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>pwd_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pwd_id" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>indigenous_member</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="indigenous_member" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>priority_group</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="priority_group" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>sub_priority_group</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="sub_priority_group" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>occupation</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="occupation" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>with_allergy</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="with_allergy" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>with_comorbidity</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="with_comorbidity" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>is_registered</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="is_registered" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>origin</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="origin" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>employer_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="employer_name" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>employer_address</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="employer_address" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>employer_lgu</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="employer_lgu" data-endpoint="PUTapi-doh-registration--registration-" data-component="body"  hidden>
<br>
        </p>
    
    </form>

            <h2 id="uncategorized-DELETEapi-doh-registration--registration-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/registration/2"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-DELETEapi-doh-registration--registration-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-doh-registration--registration-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-doh-registration--registration-"></code></pre>
</div>
<div id="execution-error-DELETEapi-doh-registration--registration-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-doh-registration--registration-"></code></pre>
</div>
<form id="form-DELETEapi-doh-registration--registration-" data-method="DELETE"
      data-path="api/doh/registration/{registration}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-doh-registration--registration-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-doh-registration--registration-"
                    onclick="tryItOut('DELETEapi-doh-registration--registration-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-doh-registration--registration-"
                    onclick="cancelTryOut('DELETEapi-doh-registration--registration-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-doh-registration--registration-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/doh/registration/{registration}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-doh-registration--registration-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-doh-registration--registration-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>registration</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="registration" data-endpoint="DELETEapi-doh-registration--registration-" data-component="url" required  hidden>
<br>
            </p>
                    </form>

            <h2 id="uncategorized-GETapi-doh-vaccines">Display List of vaccinations</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/vaccines"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-doh-vaccines" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doh-vaccines"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doh-vaccines"></code></pre>
</div>
<div id="execution-error-GETapi-doh-vaccines" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doh-vaccines"></code></pre>
</div>
<form id="form-GETapi-doh-vaccines" data-method="GET"
      data-path="api/doh/vaccines"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doh-vaccines', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doh-vaccines"
                    onclick="tryItOut('GETapi-doh-vaccines');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doh-vaccines"
                    onclick="cancelTryOut('GETapi-doh-vaccines');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doh-vaccines" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doh/vaccines</code></b>
        </p>
                <p>
            <label id="auth-GETapi-doh-vaccines" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-doh-vaccines"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="uncategorized-GETapi-doh-dosages--id-">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/dosages/9"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-doh-dosages--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doh-dosages--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doh-dosages--id-"></code></pre>
</div>
<div id="execution-error-GETapi-doh-dosages--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doh-dosages--id-"></code></pre>
</div>
<form id="form-GETapi-doh-dosages--id-" data-method="GET"
      data-path="api/doh/dosages/{id}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doh-dosages--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doh-dosages--id-"
                    onclick="tryItOut('GETapi-doh-dosages--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doh-dosages--id-"
                    onclick="cancelTryOut('GETapi-doh-dosages--id-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doh-dosages--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doh/dosages/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-doh-dosages--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-doh-dosages--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETapi-doh-dosages--id-" data-component="url" required  hidden>
<br>
<p>The ID of the dosage.</p>            </p>
                    </form>

            <h2 id="uncategorized-POSTapi-doh-vaccine">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/vaccine"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

let body = {
    "qr_pass_id": "ratione",
    "vaccination_facility": 18
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTapi-doh-vaccine" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-doh-vaccine"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-doh-vaccine"></code></pre>
</div>
<div id="execution-error-POSTapi-doh-vaccine" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-doh-vaccine"></code></pre>
</div>
<form id="form-POSTapi-doh-vaccine" data-method="POST"
      data-path="api/doh/vaccine"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-doh-vaccine', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-doh-vaccine"
                    onclick="tryItOut('POSTapi-doh-vaccine');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-doh-vaccine"
                    onclick="cancelTryOut('POSTapi-doh-vaccine');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-doh-vaccine" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/doh/vaccine</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-doh-vaccine" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-doh-vaccine"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>qr_pass_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="qr_pass_id" data-endpoint="POSTapi-doh-vaccine" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>vaccination_facility</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="vaccination_facility" data-endpoint="POSTapi-doh-vaccine" data-component="body"  hidden>
<br>
        </p>
    
    </form>

            <h2 id="uncategorized-GETapi-doh-vaccine--vaccine-">Show vaccine administration</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>

<p>Vaccine administration with dosages</p>

<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/vaccine/18"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-doh-vaccine--vaccine-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doh-vaccine--vaccine-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doh-vaccine--vaccine-"></code></pre>
</div>
<div id="execution-error-GETapi-doh-vaccine--vaccine-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doh-vaccine--vaccine-"></code></pre>
</div>
<form id="form-GETapi-doh-vaccine--vaccine-" data-method="GET"
      data-path="api/doh/vaccine/{vaccine}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doh-vaccine--vaccine-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doh-vaccine--vaccine-"
                    onclick="tryItOut('GETapi-doh-vaccine--vaccine-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doh-vaccine--vaccine-"
                    onclick="cancelTryOut('GETapi-doh-vaccine--vaccine-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doh-vaccine--vaccine-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doh/vaccine/{vaccine}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-doh-vaccine--vaccine-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-doh-vaccine--vaccine-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>vaccine</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="vaccine" data-endpoint="GETapi-doh-vaccine--vaccine-" data-component="url" required  hidden>
<br>
            </p>
                    </form>

            <h2 id="uncategorized-PUTapi-doh-vaccine--vaccine-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/vaccine/12"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

let body = {
    "vaccination_session": 14,
    "dosages": [
        "quae"
    ],
    "delete": [
        "cumque"
    ]
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-PUTapi-doh-vaccine--vaccine-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-doh-vaccine--vaccine-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-doh-vaccine--vaccine-"></code></pre>
</div>
<div id="execution-error-PUTapi-doh-vaccine--vaccine-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-doh-vaccine--vaccine-"></code></pre>
</div>
<form id="form-PUTapi-doh-vaccine--vaccine-" data-method="PUT"
      data-path="api/doh/vaccine/{vaccine}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-doh-vaccine--vaccine-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-doh-vaccine--vaccine-"
                    onclick="tryItOut('PUTapi-doh-vaccine--vaccine-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-doh-vaccine--vaccine-"
                    onclick="cancelTryOut('PUTapi-doh-vaccine--vaccine-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-doh-vaccine--vaccine-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/doh/vaccine/{vaccine}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/doh/vaccine/{vaccine}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-doh-vaccine--vaccine-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-doh-vaccine--vaccine-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>vaccine</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="vaccine" data-endpoint="PUTapi-doh-vaccine--vaccine-" data-component="url" required  hidden>
<br>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>vaccination_session</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="vaccination_session" data-endpoint="PUTapi-doh-vaccine--vaccine-" data-component="body"  hidden>
<br>
<p>'facility_others' =&gt; 'string',.</p>        </p>
                <p>
            <b><code>dosages</code></b>&nbsp;&nbsp;<small>string[]</small>     <i>optional</i> &nbsp;
<input type="text" name="dosages.0" data-endpoint="PUTapi-doh-vaccine--vaccine-" data-component="body"  hidden>
<input type="text" name="dosages.1" data-endpoint="PUTapi-doh-vaccine--vaccine-" data-component="body" hidden>
<br>
        </p>
                <p>
            <b><code>delete</code></b>&nbsp;&nbsp;<small>string[]</small>     <i>optional</i> &nbsp;
<input type="text" name="delete.0" data-endpoint="PUTapi-doh-vaccine--vaccine-" data-component="body"  hidden>
<input type="text" name="delete.1" data-endpoint="PUTapi-doh-vaccine--vaccine-" data-component="body" hidden>
<br>
        </p>
    
    </form>

            <h2 id="uncategorized-DELETEapi-doh-vaccine--vaccine-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/vaccine/7"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-DELETEapi-doh-vaccine--vaccine-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-doh-vaccine--vaccine-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-doh-vaccine--vaccine-"></code></pre>
</div>
<div id="execution-error-DELETEapi-doh-vaccine--vaccine-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-doh-vaccine--vaccine-"></code></pre>
</div>
<form id="form-DELETEapi-doh-vaccine--vaccine-" data-method="DELETE"
      data-path="api/doh/vaccine/{vaccine}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-doh-vaccine--vaccine-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-doh-vaccine--vaccine-"
                    onclick="tryItOut('DELETEapi-doh-vaccine--vaccine-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-doh-vaccine--vaccine-"
                    onclick="cancelTryOut('DELETEapi-doh-vaccine--vaccine-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-doh-vaccine--vaccine-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/doh/vaccine/{vaccine}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-doh-vaccine--vaccine-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-doh-vaccine--vaccine-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>vaccine</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="vaccine" data-endpoint="DELETEapi-doh-vaccine--vaccine-" data-component="url" required  hidden>
<br>
            </p>
                    </form>

            <h2 id="uncategorized-POSTapi-doh-dosage">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/dosage"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

let body = {
    "vaccine_id": 16,
    "qr_pass_id": "necessitatibus",
    "user_id": 17,
    "brand_name": 2,
    "vaccine_name": 18,
    "site_of_injection": "inventore",
    "expiry_date": "2021-06-30T14:46:30",
    "batch_number": 11,
    "lot_number": 15,
    "dose": 14,
    "diluent_batch_number": 9,
    "diluent_lot_number": 7,
    "date_of_vaccination": "2021-06-30T14:46:30",
    "next_vaccination": "2021-06-30T14:46:30"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTapi-doh-dosage" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-doh-dosage"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-doh-dosage"></code></pre>
</div>
<div id="execution-error-POSTapi-doh-dosage" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-doh-dosage"></code></pre>
</div>
<form id="form-POSTapi-doh-dosage" data-method="POST"
      data-path="api/doh/dosage"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-doh-dosage', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-doh-dosage"
                    onclick="tryItOut('POSTapi-doh-dosage');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-doh-dosage"
                    onclick="cancelTryOut('POSTapi-doh-dosage');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-doh-dosage" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/doh/dosage</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-doh-dosage" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-doh-dosage"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>vaccine_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="vaccine_id" data-endpoint="POSTapi-doh-dosage" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>qr_pass_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="qr_pass_id" data-endpoint="POSTapi-doh-dosage" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="user_id" data-endpoint="POSTapi-doh-dosage" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>brand_name</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="brand_name" data-endpoint="POSTapi-doh-dosage" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>vaccine_name</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="vaccine_name" data-endpoint="POSTapi-doh-dosage" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>site_of_injection</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="site_of_injection" data-endpoint="POSTapi-doh-dosage" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>expiry_date</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="expiry_date" data-endpoint="POSTapi-doh-dosage" data-component="body"  hidden>
<br>
<p>validation.date.</p>        </p>
                <p>
            <b><code>batch_number</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="batch_number" data-endpoint="POSTapi-doh-dosage" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>lot_number</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="lot_number" data-endpoint="POSTapi-doh-dosage" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>dose</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="dose" data-endpoint="POSTapi-doh-dosage" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>diluent_batch_number</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="diluent_batch_number" data-endpoint="POSTapi-doh-dosage" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>diluent_lot_number</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="diluent_lot_number" data-endpoint="POSTapi-doh-dosage" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>date_of_vaccination</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="date_of_vaccination" data-endpoint="POSTapi-doh-dosage" data-component="body"  hidden>
<br>
<p>validation.date.</p>        </p>
                <p>
            <b><code>next_vaccination</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="next_vaccination" data-endpoint="POSTapi-doh-dosage" data-component="body"  hidden>
<br>
<p>validation.date.</p>        </p>
    
    </form>

            <h2 id="uncategorized-GETapi-doh-dosage--dosage-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/dosage/1"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-doh-dosage--dosage-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doh-dosage--dosage-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doh-dosage--dosage-"></code></pre>
</div>
<div id="execution-error-GETapi-doh-dosage--dosage-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doh-dosage--dosage-"></code></pre>
</div>
<form id="form-GETapi-doh-dosage--dosage-" data-method="GET"
      data-path="api/doh/dosage/{dosage}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doh-dosage--dosage-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doh-dosage--dosage-"
                    onclick="tryItOut('GETapi-doh-dosage--dosage-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doh-dosage--dosage-"
                    onclick="cancelTryOut('GETapi-doh-dosage--dosage-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doh-dosage--dosage-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doh/dosage/{dosage}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-doh-dosage--dosage-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-doh-dosage--dosage-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>dosage</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="dosage" data-endpoint="GETapi-doh-dosage--dosage-" data-component="url" required  hidden>
<br>
            </p>
                    </form>

            <h2 id="uncategorized-PUTapi-doh-dosage--dosage-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/dosage/4"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

let body = {
    "vaccine_id": 18,
    "user_id": 16,
    "brand_name": 16,
    "vaccine_name": "alias",
    "site_of_injection": "autem",
    "expiry_date": "2021-06-30T14:46:30",
    "batch_number": 10,
    "lot_number": 8,
    "dose": 6,
    "date_of_vaccination": "2021-06-30T14:46:30",
    "next_vaccination": "2021-06-30T14:46:30"
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-PUTapi-doh-dosage--dosage-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-doh-dosage--dosage-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-doh-dosage--dosage-"></code></pre>
</div>
<div id="execution-error-PUTapi-doh-dosage--dosage-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-doh-dosage--dosage-"></code></pre>
</div>
<form id="form-PUTapi-doh-dosage--dosage-" data-method="PUT"
      data-path="api/doh/dosage/{dosage}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-doh-dosage--dosage-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-doh-dosage--dosage-"
                    onclick="tryItOut('PUTapi-doh-dosage--dosage-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-doh-dosage--dosage-"
                    onclick="cancelTryOut('PUTapi-doh-dosage--dosage-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-doh-dosage--dosage-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/doh/dosage/{dosage}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/doh/dosage/{dosage}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-doh-dosage--dosage-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-doh-dosage--dosage-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>dosage</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="dosage" data-endpoint="PUTapi-doh-dosage--dosage-" data-component="url" required  hidden>
<br>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>vaccine_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="vaccine_id" data-endpoint="PUTapi-doh-dosage--dosage-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>user_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="user_id" data-endpoint="PUTapi-doh-dosage--dosage-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>brand_name</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="brand_name" data-endpoint="PUTapi-doh-dosage--dosage-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>vaccine_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="vaccine_name" data-endpoint="PUTapi-doh-dosage--dosage-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>site_of_injection</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="site_of_injection" data-endpoint="PUTapi-doh-dosage--dosage-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>expiry_date</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="expiry_date" data-endpoint="PUTapi-doh-dosage--dosage-" data-component="body"  hidden>
<br>
<p>validation.date.</p>        </p>
                <p>
            <b><code>batch_number</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="batch_number" data-endpoint="PUTapi-doh-dosage--dosage-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>lot_number</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="lot_number" data-endpoint="PUTapi-doh-dosage--dosage-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>dose</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="dose" data-endpoint="PUTapi-doh-dosage--dosage-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>date_of_vaccination</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="date_of_vaccination" data-endpoint="PUTapi-doh-dosage--dosage-" data-component="body"  hidden>
<br>
<p>validation.date.</p>        </p>
                <p>
            <b><code>next_vaccination</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="next_vaccination" data-endpoint="PUTapi-doh-dosage--dosage-" data-component="body"  hidden>
<br>
<p>validation.date.</p>        </p>
    
    </form>

            <h2 id="uncategorized-DELETEapi-doh-dosage--dosage-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/dosage/14"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-DELETEapi-doh-dosage--dosage-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-doh-dosage--dosage-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-doh-dosage--dosage-"></code></pre>
</div>
<div id="execution-error-DELETEapi-doh-dosage--dosage-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-doh-dosage--dosage-"></code></pre>
</div>
<form id="form-DELETEapi-doh-dosage--dosage-" data-method="DELETE"
      data-path="api/doh/dosage/{dosage}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-doh-dosage--dosage-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-doh-dosage--dosage-"
                    onclick="tryItOut('DELETEapi-doh-dosage--dosage-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-doh-dosage--dosage-"
                    onclick="cancelTryOut('DELETEapi-doh-dosage--dosage-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-doh-dosage--dosage-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/doh/dosage/{dosage}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-doh-dosage--dosage-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-doh-dosage--dosage-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>dosage</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="dosage" data-endpoint="DELETEapi-doh-dosage--dosage-" data-component="url" required  hidden>
<br>
            </p>
                    </form>

            <h2 id="uncategorized-GETapi-doh-vaccines-qr--id-">api/doh/vaccines/qr/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/vaccines/qr/sed"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-doh-vaccines-qr--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doh-vaccines-qr--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doh-vaccines-qr--id-"></code></pre>
</div>
<div id="execution-error-GETapi-doh-vaccines-qr--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doh-vaccines-qr--id-"></code></pre>
</div>
<form id="form-GETapi-doh-vaccines-qr--id-" data-method="GET"
      data-path="api/doh/vaccines/qr/{id}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doh-vaccines-qr--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doh-vaccines-qr--id-"
                    onclick="tryItOut('GETapi-doh-vaccines-qr--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doh-vaccines-qr--id-"
                    onclick="cancelTryOut('GETapi-doh-vaccines-qr--id-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doh-vaccines-qr--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doh/vaccines/qr/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-doh-vaccines-qr--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-doh-vaccines-qr--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-doh-vaccines-qr--id-" data-component="url" required  hidden>
<br>
<p>The ID of the qr.</p>            </p>
                    </form>

            <h2 id="uncategorized-PUTapi-doh-vaccines-update-registration--id-">api/doh/vaccines/update/registration/{id}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/vaccines/update/registration/5"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

let body = {
    "id": 14,
    "qr_pass_id": "ad",
    "first_name": "saepe",
    "last_name": "hic",
    "suffix": "laudantium",
    "birthdate": "aspernatur",
    "gender": "consequatur",
    "barangay": "optio",
    "town_city": "voluptatum",
    "province": "asperiores",
    "contact_no": "harum",
    "priority_group": "aliquam",
    "sub_priority_group": "nihil",
    "allergic_to_vaccines": "maiores",
    "is_registered": "aspernatur",
    "with_comorbidity": "dignissimos"
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-PUTapi-doh-vaccines-update-registration--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-doh-vaccines-update-registration--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-doh-vaccines-update-registration--id-"></code></pre>
</div>
<div id="execution-error-PUTapi-doh-vaccines-update-registration--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-doh-vaccines-update-registration--id-"></code></pre>
</div>
<form id="form-PUTapi-doh-vaccines-update-registration--id-" data-method="PUT"
      data-path="api/doh/vaccines/update/registration/{id}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-doh-vaccines-update-registration--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-doh-vaccines-update-registration--id-"
                    onclick="tryItOut('PUTapi-doh-vaccines-update-registration--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-doh-vaccines-update-registration--id-"
                    onclick="cancelTryOut('PUTapi-doh-vaccines-update-registration--id-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-doh-vaccines-update-registration--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/doh/vaccines/update/registration/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-doh-vaccines-update-registration--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-doh-vaccines-update-registration--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="PUTapi-doh-vaccines-update-registration--id-" data-component="url" required  hidden>
<br>
<p>The ID of the registration.</p>            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="id" data-endpoint="PUTapi-doh-vaccines-update-registration--id-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>qr_pass_id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="qr_pass_id" data-endpoint="PUTapi-doh-vaccines-update-registration--id-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>first_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="first_name" data-endpoint="PUTapi-doh-vaccines-update-registration--id-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>last_name</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="last_name" data-endpoint="PUTapi-doh-vaccines-update-registration--id-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>suffix</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="suffix" data-endpoint="PUTapi-doh-vaccines-update-registration--id-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>birthdate</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="birthdate" data-endpoint="PUTapi-doh-vaccines-update-registration--id-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>gender</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="gender" data-endpoint="PUTapi-doh-vaccines-update-registration--id-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>barangay</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="barangay" data-endpoint="PUTapi-doh-vaccines-update-registration--id-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>town_city</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="town_city" data-endpoint="PUTapi-doh-vaccines-update-registration--id-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>province</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="province" data-endpoint="PUTapi-doh-vaccines-update-registration--id-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>contact_no</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="contact_no" data-endpoint="PUTapi-doh-vaccines-update-registration--id-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>priority_group</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="priority_group" data-endpoint="PUTapi-doh-vaccines-update-registration--id-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>sub_priority_group</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="sub_priority_group" data-endpoint="PUTapi-doh-vaccines-update-registration--id-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>allergic_to_vaccines</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="allergic_to_vaccines" data-endpoint="PUTapi-doh-vaccines-update-registration--id-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>is_registered</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="is_registered" data-endpoint="PUTapi-doh-vaccines-update-registration--id-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>with_comorbidity</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="with_comorbidity" data-endpoint="PUTapi-doh-vaccines-update-registration--id-" data-component="body"  hidden>
<br>
        </p>
    
    </form>

            <h2 id="uncategorized-GETapi-doh-vaccines-default-vaccinator">Handle the incoming request.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/vaccines/default/vaccinator"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-doh-vaccines-default-vaccinator" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doh-vaccines-default-vaccinator"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doh-vaccines-default-vaccinator"></code></pre>
</div>
<div id="execution-error-GETapi-doh-vaccines-default-vaccinator" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doh-vaccines-default-vaccinator"></code></pre>
</div>
<form id="form-GETapi-doh-vaccines-default-vaccinator" data-method="GET"
      data-path="api/doh/vaccines/default/vaccinator"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doh-vaccines-default-vaccinator', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doh-vaccines-default-vaccinator"
                    onclick="tryItOut('GETapi-doh-vaccines-default-vaccinator');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doh-vaccines-default-vaccinator"
                    onclick="cancelTryOut('GETapi-doh-vaccines-default-vaccinator');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doh-vaccines-default-vaccinator" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doh/vaccines/default/vaccinator</code></b>
        </p>
                <p>
            <label id="auth-GETapi-doh-vaccines-default-vaccinator" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-doh-vaccines-default-vaccinator"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="uncategorized-GETapi-doh-pres--id-">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/pres/culpa"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-doh-pres--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doh-pres--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doh-pres--id-"></code></pre>
</div>
<div id="execution-error-GETapi-doh-pres--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doh-pres--id-"></code></pre>
</div>
<form id="form-GETapi-doh-pres--id-" data-method="GET"
      data-path="api/doh/pres/{id}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doh-pres--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doh-pres--id-"
                    onclick="tryItOut('GETapi-doh-pres--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doh-pres--id-"
                    onclick="cancelTryOut('GETapi-doh-pres--id-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doh-pres--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doh/pres/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-doh-pres--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-doh-pres--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-doh-pres--id-" data-component="url" required  hidden>
<br>
<p>The ID of the pre.</p>            </p>
                    </form>

            <h2 id="uncategorized-POSTapi-doh-pre">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/pre"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTapi-doh-pre" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-doh-pre"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-doh-pre"></code></pre>
</div>
<div id="execution-error-POSTapi-doh-pre" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-doh-pre"></code></pre>
</div>
<form id="form-POSTapi-doh-pre" data-method="POST"
      data-path="api/doh/pre"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-doh-pre', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-doh-pre"
                    onclick="tryItOut('POSTapi-doh-pre');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-doh-pre"
                    onclick="cancelTryOut('POSTapi-doh-pre');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-doh-pre" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/doh/pre</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-doh-pre" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-doh-pre"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="uncategorized-GETapi-doh-pre--pre-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/pre/ut"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-doh-pre--pre-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doh-pre--pre-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doh-pre--pre-"></code></pre>
</div>
<div id="execution-error-GETapi-doh-pre--pre-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doh-pre--pre-"></code></pre>
</div>
<form id="form-GETapi-doh-pre--pre-" data-method="GET"
      data-path="api/doh/pre/{pre}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doh-pre--pre-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doh-pre--pre-"
                    onclick="tryItOut('GETapi-doh-pre--pre-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doh-pre--pre-"
                    onclick="cancelTryOut('GETapi-doh-pre--pre-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doh-pre--pre-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doh/pre/{pre}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-doh-pre--pre-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-doh-pre--pre-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>pre</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="pre" data-endpoint="GETapi-doh-pre--pre-" data-component="url" required  hidden>
<br>
            </p>
                    </form>

            <h2 id="uncategorized-PUTapi-doh-pre--pre-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/pre/et"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

let body = {
    "consent": 5,
    "blood_pressure": "repellat",
    "oxygen_saturation": "similique",
    "pulse_rate": "eligendi",
    "assessments": [
        "repellat"
    ]
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-PUTapi-doh-pre--pre-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-doh-pre--pre-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-doh-pre--pre-"></code></pre>
</div>
<div id="execution-error-PUTapi-doh-pre--pre-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-doh-pre--pre-"></code></pre>
</div>
<form id="form-PUTapi-doh-pre--pre-" data-method="PUT"
      data-path="api/doh/pre/{pre}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-doh-pre--pre-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-doh-pre--pre-"
                    onclick="tryItOut('PUTapi-doh-pre--pre-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-doh-pre--pre-"
                    onclick="cancelTryOut('PUTapi-doh-pre--pre-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-doh-pre--pre-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/doh/pre/{pre}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/doh/pre/{pre}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-doh-pre--pre-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-doh-pre--pre-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>pre</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="pre" data-endpoint="PUTapi-doh-pre--pre-" data-component="url" required  hidden>
<br>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>consent</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="consent" data-endpoint="PUTapi-doh-pre--pre-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>blood_pressure</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="blood_pressure" data-endpoint="PUTapi-doh-pre--pre-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>oxygen_saturation</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="oxygen_saturation" data-endpoint="PUTapi-doh-pre--pre-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>pulse_rate</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pulse_rate" data-endpoint="PUTapi-doh-pre--pre-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>assessments</code></b>&nbsp;&nbsp;<small>string[]</small>     <i>optional</i> &nbsp;
<input type="text" name="assessments.0" data-endpoint="PUTapi-doh-pre--pre-" data-component="body"  hidden>
<input type="text" name="assessments.1" data-endpoint="PUTapi-doh-pre--pre-" data-component="body" hidden>
<br>
        </p>
    
    </form>

            <h2 id="uncategorized-DELETEapi-doh-pre--pre-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/pre/qui"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-DELETEapi-doh-pre--pre-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-doh-pre--pre-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-doh-pre--pre-"></code></pre>
</div>
<div id="execution-error-DELETEapi-doh-pre--pre-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-doh-pre--pre-"></code></pre>
</div>
<form id="form-DELETEapi-doh-pre--pre-" data-method="DELETE"
      data-path="api/doh/pre/{pre}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-doh-pre--pre-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-doh-pre--pre-"
                    onclick="tryItOut('DELETEapi-doh-pre--pre-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-doh-pre--pre-"
                    onclick="cancelTryOut('DELETEapi-doh-pre--pre-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-doh-pre--pre-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/doh/pre/{pre}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-doh-pre--pre-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-doh-pre--pre-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>pre</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="pre" data-endpoint="DELETEapi-doh-pre--pre-" data-component="url" required  hidden>
<br>
            </p>
                    </form>

            <h2 id="uncategorized-GETapi-doh-structure-assessments-pre">api/doh/structure/assessments/pre</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/structure/assessments/pre"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-doh-structure-assessments-pre" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doh-structure-assessments-pre"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doh-structure-assessments-pre"></code></pre>
</div>
<div id="execution-error-GETapi-doh-structure-assessments-pre" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doh-structure-assessments-pre"></code></pre>
</div>
<form id="form-GETapi-doh-structure-assessments-pre" data-method="GET"
      data-path="api/doh/structure/assessments/pre"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doh-structure-assessments-pre', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doh-structure-assessments-pre"
                    onclick="tryItOut('GETapi-doh-structure-assessments-pre');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doh-structure-assessments-pre"
                    onclick="cancelTryOut('GETapi-doh-structure-assessments-pre');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doh-structure-assessments-pre" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doh/structure/assessments/pre</code></b>
        </p>
                <p>
            <label id="auth-GETapi-doh-structure-assessments-pre" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-doh-structure-assessments-pre"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="uncategorized-GETapi-doh-posts--id-">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/posts/commodi"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-doh-posts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doh-posts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doh-posts--id-"></code></pre>
</div>
<div id="execution-error-GETapi-doh-posts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doh-posts--id-"></code></pre>
</div>
<form id="form-GETapi-doh-posts--id-" data-method="GET"
      data-path="api/doh/posts/{id}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doh-posts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doh-posts--id-"
                    onclick="tryItOut('GETapi-doh-posts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doh-posts--id-"
                    onclick="cancelTryOut('GETapi-doh-posts--id-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doh-posts--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doh/posts/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-doh-posts--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-doh-posts--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="GETapi-doh-posts--id-" data-component="url" required  hidden>
<br>
<p>The ID of the post.</p>            </p>
                    </form>

            <h2 id="uncategorized-POSTapi-doh-post">Store a newly created resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/post"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTapi-doh-post" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-doh-post"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-doh-post"></code></pre>
</div>
<div id="execution-error-POSTapi-doh-post" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-doh-post"></code></pre>
</div>
<form id="form-POSTapi-doh-post" data-method="POST"
      data-path="api/doh/post"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-doh-post', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-doh-post"
                    onclick="tryItOut('POSTapi-doh-post');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-doh-post"
                    onclick="cancelTryOut('POSTapi-doh-post');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-doh-post" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/doh/post</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-doh-post" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-doh-post"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="uncategorized-GETapi-doh-post--post-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/post/facilis"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-doh-post--post-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doh-post--post-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doh-post--post-"></code></pre>
</div>
<div id="execution-error-GETapi-doh-post--post-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doh-post--post-"></code></pre>
</div>
<form id="form-GETapi-doh-post--post-" data-method="GET"
      data-path="api/doh/post/{post}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doh-post--post-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doh-post--post-"
                    onclick="tryItOut('GETapi-doh-post--post-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doh-post--post-"
                    onclick="cancelTryOut('GETapi-doh-post--post-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doh-post--post-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doh/post/{post}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-doh-post--post-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-doh-post--post-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>post</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="post" data-endpoint="GETapi-doh-post--post-" data-component="url" required  hidden>
<br>
            </p>
                    </form>

            <h2 id="uncategorized-PUTapi-doh-post--post-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/post/porro"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

let body = {
    "assessments": [
        "dolorem"
    ],
    "blood_pressure": "beatae",
    "oxygen_saturation": "minus",
    "pulse_rate": "sed"
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-PUTapi-doh-post--post-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-doh-post--post-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-doh-post--post-"></code></pre>
</div>
<div id="execution-error-PUTapi-doh-post--post-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-doh-post--post-"></code></pre>
</div>
<form id="form-PUTapi-doh-post--post-" data-method="PUT"
      data-path="api/doh/post/{post}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-doh-post--post-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-doh-post--post-"
                    onclick="tryItOut('PUTapi-doh-post--post-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-doh-post--post-"
                    onclick="cancelTryOut('PUTapi-doh-post--post-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-doh-post--post-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/doh/post/{post}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/doh/post/{post}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-doh-post--post-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="PUTapi-doh-post--post-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>post</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="post" data-endpoint="PUTapi-doh-post--post-" data-component="url" required  hidden>
<br>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>assessments</code></b>&nbsp;&nbsp;<small>string[]</small>     <i>optional</i> &nbsp;
<input type="text" name="assessments.0" data-endpoint="PUTapi-doh-post--post-" data-component="body"  hidden>
<input type="text" name="assessments.1" data-endpoint="PUTapi-doh-post--post-" data-component="body" hidden>
<br>
        </p>
                <p>
            <b><code>blood_pressure</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="blood_pressure" data-endpoint="PUTapi-doh-post--post-" data-component="body"  hidden>
<br>
<h1>array.</h1>        </p>
                <p>
            <b><code>oxygen_saturation</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="oxygen_saturation" data-endpoint="PUTapi-doh-post--post-" data-component="body"  hidden>
<br>
        </p>
                <p>
            <b><code>pulse_rate</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="pulse_rate" data-endpoint="PUTapi-doh-post--post-" data-component="body"  hidden>
<br>
        </p>
    
    </form>

            <h2 id="uncategorized-DELETEapi-doh-post--post-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/post/facere"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-DELETEapi-doh-post--post-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-doh-post--post-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-doh-post--post-"></code></pre>
</div>
<div id="execution-error-DELETEapi-doh-post--post-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-doh-post--post-"></code></pre>
</div>
<form id="form-DELETEapi-doh-post--post-" data-method="DELETE"
      data-path="api/doh/post/{post}"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-doh-post--post-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-doh-post--post-"
                    onclick="tryItOut('DELETEapi-doh-post--post-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-doh-post--post-"
                    onclick="cancelTryOut('DELETEapi-doh-post--post-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-doh-post--post-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/doh/post/{post}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-doh-post--post-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-doh-post--post-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>post</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="post" data-endpoint="DELETEapi-doh-post--post-" data-component="url" required  hidden>
<br>
            </p>
                    </form>

            <h2 id="uncategorized-GETapi-doh-structure-assessments-post">api/doh/structure/assessments/post</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/structure/assessments/post"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-doh-structure-assessments-post" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doh-structure-assessments-post"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doh-structure-assessments-post"></code></pre>
</div>
<div id="execution-error-GETapi-doh-structure-assessments-post" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doh-structure-assessments-post"></code></pre>
</div>
<form id="form-GETapi-doh-structure-assessments-post" data-method="GET"
      data-path="api/doh/structure/assessments/post"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doh-structure-assessments-post', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doh-structure-assessments-post"
                    onclick="tryItOut('GETapi-doh-structure-assessments-post');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doh-structure-assessments-post"
                    onclick="cancelTryOut('GETapi-doh-structure-assessments-post');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doh-structure-assessments-post" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doh/structure/assessments/post</code></b>
        </p>
                <p>
            <label id="auth-GETapi-doh-structure-assessments-post" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-doh-structure-assessments-post"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="uncategorized-POSTapi-doh-upload-excel">api/doh/upload/excel</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/upload/excel"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

let body = {
    "excel": "quia"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTapi-doh-upload-excel" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-doh-upload-excel"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-doh-upload-excel"></code></pre>
</div>
<div id="execution-error-POSTapi-doh-upload-excel" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-doh-upload-excel"></code></pre>
</div>
<form id="form-POSTapi-doh-upload-excel" data-method="POST"
      data-path="api/doh/upload/excel"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-doh-upload-excel', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-doh-upload-excel"
                    onclick="tryItOut('POSTapi-doh-upload-excel');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-doh-upload-excel"
                    onclick="cancelTryOut('POSTapi-doh-upload-excel');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-doh-upload-excel" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/doh/upload/excel</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-doh-upload-excel" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-doh-upload-excel"
                                                                data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>excel</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="excel" data-endpoint="POSTapi-doh-upload-excel" data-component="body" required  hidden>
<br>
        </p>
    
    </form>

            <h2 id="uncategorized-POSTapi-doh-excel-data-structure">Check if excel file has correct structures</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/excel/data/structure"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTapi-doh-excel-data-structure" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-doh-excel-data-structure"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-doh-excel-data-structure"></code></pre>
</div>
<div id="execution-error-POSTapi-doh-excel-data-structure" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-doh-excel-data-structure"></code></pre>
</div>
<form id="form-POSTapi-doh-excel-data-structure" data-method="POST"
      data-path="api/doh/excel/data/structure"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-doh-excel-data-structure', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-doh-excel-data-structure"
                    onclick="tryItOut('POSTapi-doh-excel-data-structure');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-doh-excel-data-structure"
                    onclick="cancelTryOut('POSTapi-doh-excel-data-structure');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-doh-excel-data-structure" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/doh/excel/data/structure</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-doh-excel-data-structure" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-doh-excel-data-structure"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="uncategorized-POSTapi-doh-excel-data-import">Import row from excel file</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/excel/data/import"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre>

<div id="execution-results-POSTapi-doh-excel-data-import" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-doh-excel-data-import"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-doh-excel-data-import"></code></pre>
</div>
<div id="execution-error-POSTapi-doh-excel-data-import" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-doh-excel-data-import"></code></pre>
</div>
<form id="form-POSTapi-doh-excel-data-import" data-method="POST"
      data-path="api/doh/excel/data/import"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-doh-excel-data-import', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-doh-excel-data-import"
                    onclick="tryItOut('POSTapi-doh-excel-data-import');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-doh-excel-data-import"
                    onclick="cancelTryOut('POSTapi-doh-excel-data-import');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-doh-excel-data-import" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/doh/excel/data/import</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-doh-excel-data-import" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-doh-excel-data-import"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="uncategorized-GETapi-general-selections-hospitals">Hospital selection</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/general/selections/hospitals"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-general-selections-hospitals" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-general-selections-hospitals"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-general-selections-hospitals"></code></pre>
</div>
<div id="execution-error-GETapi-general-selections-hospitals" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-general-selections-hospitals"></code></pre>
</div>
<form id="form-GETapi-general-selections-hospitals" data-method="GET"
      data-path="api/general/selections/hospitals"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-general-selections-hospitals', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-general-selections-hospitals"
                    onclick="tryItOut('GETapi-general-selections-hospitals');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-general-selections-hospitals"
                    onclick="cancelTryOut('GETapi-general-selections-hospitals');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-general-selections-hospitals" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/general/selections/hospitals</code></b>
        </p>
                <p>
            <label id="auth-GETapi-general-selections-hospitals" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-general-selections-hospitals"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="uncategorized-GETapi-general-selections-groups">api/general/selections/groups</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/general/selections/groups"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-general-selections-groups" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-general-selections-groups"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-general-selections-groups"></code></pre>
</div>
<div id="execution-error-GETapi-general-selections-groups" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-general-selections-groups"></code></pre>
</div>
<form id="form-GETapi-general-selections-groups" data-method="GET"
      data-path="api/general/selections/groups"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-general-selections-groups', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-general-selections-groups"
                    onclick="tryItOut('GETapi-general-selections-groups');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-general-selections-groups"
                    onclick="cancelTryOut('GETapi-general-selections-groups');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-general-selections-groups" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/general/selections/groups</code></b>
        </p>
                <p>
            <label id="auth-GETapi-general-selections-groups" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-general-selections-groups"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="uncategorized-GETapi-general-selections-users">api/general/selections/users</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/general/selections/users"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-general-selections-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-general-selections-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-general-selections-users"></code></pre>
</div>
<div id="execution-error-GETapi-general-selections-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-general-selections-users"></code></pre>
</div>
<form id="form-GETapi-general-selections-users" data-method="GET"
      data-path="api/general/selections/users"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-general-selections-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-general-selections-users"
                    onclick="tryItOut('GETapi-general-selections-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-general-selections-users"
                    onclick="cancelTryOut('GETapi-general-selections-users');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-general-selections-users" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/general/selections/users</code></b>
        </p>
                <p>
            <label id="auth-GETapi-general-selections-users" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-general-selections-users"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="uncategorized-GETapi-general-selections-vaccinators">api/general/selections/vaccinators</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/general/selections/vaccinators"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-general-selections-vaccinators" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-general-selections-vaccinators"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-general-selections-vaccinators"></code></pre>
</div>
<div id="execution-error-GETapi-general-selections-vaccinators" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-general-selections-vaccinators"></code></pre>
</div>
<form id="form-GETapi-general-selections-vaccinators" data-method="GET"
      data-path="api/general/selections/vaccinators"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-general-selections-vaccinators', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-general-selections-vaccinators"
                    onclick="tryItOut('GETapi-general-selections-vaccinators');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-general-selections-vaccinators"
                    onclick="cancelTryOut('GETapi-general-selections-vaccinators');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-general-selections-vaccinators" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/general/selections/vaccinators</code></b>
        </p>
                <p>
            <label id="auth-GETapi-general-selections-vaccinators" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-general-selections-vaccinators"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="uncategorized-GETapi-summary-surveys">api/summary/surveys</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/summary/surveys"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-summary-surveys" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-summary-surveys"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-summary-surveys"></code></pre>
</div>
<div id="execution-error-GETapi-summary-surveys" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-summary-surveys"></code></pre>
</div>
<form id="form-GETapi-summary-surveys" data-method="GET"
      data-path="api/summary/surveys"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-summary-surveys', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-summary-surveys"
                    onclick="tryItOut('GETapi-summary-surveys');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-summary-surveys"
                    onclick="cancelTryOut('GETapi-summary-surveys');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-summary-surveys" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/summary/surveys</code></b>
        </p>
                <p>
            <label id="auth-GETapi-summary-surveys" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-summary-surveys"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="uncategorized-GETapi-summary-registrations">api/summary/registrations</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/summary/registrations"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-summary-registrations" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-summary-registrations"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-summary-registrations"></code></pre>
</div>
<div id="execution-error-GETapi-summary-registrations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-summary-registrations"></code></pre>
</div>
<form id="form-GETapi-summary-registrations" data-method="GET"
      data-path="api/summary/registrations"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-summary-registrations', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-summary-registrations"
                    onclick="tryItOut('GETapi-summary-registrations');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-summary-registrations"
                    onclick="cancelTryOut('GETapi-summary-registrations');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-summary-registrations" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/summary/registrations</code></b>
        </p>
                <p>
            <label id="auth-GETapi-summary-registrations" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-summary-registrations"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="uncategorized-GETapi-summary-vaccination">api/summary/vaccination</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/summary/vaccination"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-summary-vaccination" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-summary-vaccination"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-summary-vaccination"></code></pre>
</div>
<div id="execution-error-GETapi-summary-vaccination" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-summary-vaccination"></code></pre>
</div>
<form id="form-GETapi-summary-vaccination" data-method="GET"
      data-path="api/summary/vaccination"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-summary-vaccination', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-summary-vaccination"
                    onclick="tryItOut('GETapi-summary-vaccination');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-summary-vaccination"
                    onclick="cancelTryOut('GETapi-summary-vaccination');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-summary-vaccination" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/summary/vaccination</code></b>
        </p>
                <p>
            <label id="auth-GETapi-summary-vaccination" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-summary-vaccination"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="uncategorized-GETapi-doh-selections-vaccine-vaccines">api/doh/selections/vaccine/vaccines</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/selections/vaccine/vaccines"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-doh-selections-vaccine-vaccines" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doh-selections-vaccine-vaccines"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doh-selections-vaccine-vaccines"></code></pre>
</div>
<div id="execution-error-GETapi-doh-selections-vaccine-vaccines" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doh-selections-vaccine-vaccines"></code></pre>
</div>
<form id="form-GETapi-doh-selections-vaccine-vaccines" data-method="GET"
      data-path="api/doh/selections/vaccine/vaccines"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doh-selections-vaccine-vaccines', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doh-selections-vaccine-vaccines"
                    onclick="tryItOut('GETapi-doh-selections-vaccine-vaccines');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doh-selections-vaccine-vaccines"
                    onclick="cancelTryOut('GETapi-doh-selections-vaccine-vaccines');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doh-selections-vaccine-vaccines" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doh/selections/vaccine/vaccines</code></b>
        </p>
                <p>
            <label id="auth-GETapi-doh-selections-vaccine-vaccines" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-doh-selections-vaccine-vaccines"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="uncategorized-GETapi-doh-selections-vaccine-events">api/doh/selections/vaccine/events</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/selections/vaccine/events"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-doh-selections-vaccine-events" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doh-selections-vaccine-events"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doh-selections-vaccine-events"></code></pre>
</div>
<div id="execution-error-GETapi-doh-selections-vaccine-events" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doh-selections-vaccine-events"></code></pre>
</div>
<form id="form-GETapi-doh-selections-vaccine-events" data-method="GET"
      data-path="api/doh/selections/vaccine/events"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doh-selections-vaccine-events', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doh-selections-vaccine-events"
                    onclick="tryItOut('GETapi-doh-selections-vaccine-events');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doh-selections-vaccine-events"
                    onclick="cancelTryOut('GETapi-doh-selections-vaccine-events');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doh-selections-vaccine-events" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doh/selections/vaccine/events</code></b>
        </p>
                <p>
            <label id="auth-GETapi-doh-selections-vaccine-events" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-doh-selections-vaccine-events"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="uncategorized-GETapi-doh-selections-vaccine-deferrals">api/doh/selections/vaccine/deferrals</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/selections/vaccine/deferrals"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-doh-selections-vaccine-deferrals" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doh-selections-vaccine-deferrals"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doh-selections-vaccine-deferrals"></code></pre>
</div>
<div id="execution-error-GETapi-doh-selections-vaccine-deferrals" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doh-selections-vaccine-deferrals"></code></pre>
</div>
<form id="form-GETapi-doh-selections-vaccine-deferrals" data-method="GET"
      data-path="api/doh/selections/vaccine/deferrals"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doh-selections-vaccine-deferrals', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doh-selections-vaccine-deferrals"
                    onclick="tryItOut('GETapi-doh-selections-vaccine-deferrals');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doh-selections-vaccine-deferrals"
                    onclick="cancelTryOut('GETapi-doh-selections-vaccine-deferrals');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doh-selections-vaccine-deferrals" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doh/selections/vaccine/deferrals</code></b>
        </p>
                <p>
            <label id="auth-GETapi-doh-selections-vaccine-deferrals" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-doh-selections-vaccine-deferrals"
                                                                data-component="header"></label>
        </p>
                </form>

        <h1 id="vaccination-list">Vaccination List</h1>
    <p>
        
    </p>

            <h2 id="vaccination-list-GETapi-doh-vaccines-search-registrations">List for registered persons for vaccination

Search registrations by QR, first name, middle name, last name for vaccinations</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<blockquote>Example request:</blockquote>


<pre><code class="language-javascript">const url = new URL(
    "https://vaccines.local/api/doh/vaccines/search/registrations"
);

let params = {
    "search": "dolorum",
    "phase": "soluta",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>

    <div id="execution-results-GETapi-doh-vaccines-search-registrations" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-doh-vaccines-search-registrations"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doh-vaccines-search-registrations"></code></pre>
</div>
<div id="execution-error-GETapi-doh-vaccines-search-registrations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doh-vaccines-search-registrations"></code></pre>
</div>
<form id="form-GETapi-doh-vaccines-search-registrations" data-method="GET"
      data-path="api/doh/vaccines/search/registrations"
      data-authed="1"
      data-hasfiles=""
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Accept":"application\/json"}'
      onsubmit="event.preventDefault(); executeTryOut('GETapi-doh-vaccines-search-registrations', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-doh-vaccines-search-registrations"
                    onclick="tryItOut('GETapi-doh-vaccines-search-registrations');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-doh-vaccines-search-registrations"
                    onclick="cancelTryOut('GETapi-doh-vaccines-search-registrations');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-doh-vaccines-search-registrations" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/doh/vaccines/search/registrations</code></b>
        </p>
                <p>
            <label id="auth-GETapi-doh-vaccines-search-registrations" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-doh-vaccines-search-registrations"
                                                                data-component="header"></label>
        </p>
                    <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>search</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="search" data-endpoint="GETapi-doh-vaccines-search-registrations" data-component="query"  hidden>
<br>
            </p>
                    <p>
                <b><code>phase</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="phase" data-endpoint="GETapi-doh-vaccines-search-registrations" data-component="query"  hidden>
<br>
            </p>
                </form>

    

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                    <a href="#" data-language-name="javascript">javascript</a>
                            </div>
            </div>
</div>
<script>
    $(function () {
        var exampleLanguages = ["javascript"];
        setupLanguages(exampleLanguages);
    });
</script>
</body>
</html>