@extends('layouts.dashmix')
@section('content')
<div class="row row-justify-center">
    <div class="col-md-12">
        @if($key_count < 5)
        <div class="alert alert-warning" role="alert">
            <p class="mb-0">Before using the software, please setup at least 5 submission websites.</p>
        </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title">Submission Sites</h3>
                <small class="text-danger">Instructions will be at the right hand side.</small>
            </div>
            <div class="col-sm-12 col-md-12">
                <br>
                <div id="accordion" role="tablist" aria-multiselectable="true">
                    @foreach($apis as $api)
                    <div class="block block-rounded mb-1">
                        @php
                        $data = [];
                        $x = auth()->user()->keys()->where('id', $api->id)->first();
                        if($x) {
                        if(isset($x->pivot->data)) {
                        $data = json_decode($x->pivot->data);
                        $data = (array)$data;
                        } else {
                        $data = [];
                        }
                        } else {
                        $data = [];
                        }
                        @endphp
                        <div class="block-header block-header-default" role="tab" id="accordion_h1">
                            <a class="font-w600 opener" data-toggle="collapse" data-parent="#accordion" href="#accordion_q{{$api->id}}" data-clicker="accordion_q{{$api->id}}" data-opener="{{$api->name}}" aria-expanded="true" aria-controls="accordion_q{{$api->id}}">
                                @if(count($data) != 0)
                                <span class="badge badge-success"><i class="far fa-check-circle"></i></span>
                                @endif
                                {{ $api->name }}
                            </a>
                        </div>
                        <div id="accordion_q{{$api->id}}" class="collapse" role="tabpanel" aria-labelledby="accordion_h1" data-parent="#accordion" style="">
                            <div class="block-content">
                                <form action="{{route('key.apis-update')}}" method="POST" id="x-{{$api->id}}">
                                    @if(json_decode($api->fields))
                                    @foreach(json_decode($api->fields) as $field)
                                    @csrf
                                    <input type="hidden" name="key_id" value="{{$api->id}}">
                                    <div class="form-group">
                                        <label>{{ strtoupper($field) }}</label>
                                        <input type="{{strpos(strtolower($field), 'password') !== false ? 'password':'text'}}" class="form-control" name="data[{{$field}}]" value="{{ !empty($data[$field]) ? $data[$field] : '' }}" required>
                                    </div>
                                    @endforeach
                                    <div class="form-group">
                                        <button type="submit" form="x-{{$api->id}}" class="btn btn-success">Save</button>
                                        <button type="button" class="btn btn-warning instruction" data-name="{{ $api->name }}">Video Instruction</button>
                                    </div>
                                    @else
                                    <p><small style="color: red;">API not available.</small></p>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="block block-rounded block-bordered">
            <div class="block-header block-header-default">
                <h3 class="block-title">Submission Sites Credentials Instructions</h3>
            </div>
            <div class="block-content">
                <div id="accordion_instructions" role="tablist" aria-multiselectable="false">
                    <div class="block block-rounded mb-1">
                        <div class="block-header block-header-default" role="tab" id="accordion_h2">
                            <a class="font-w600 text-black" data-toggle="collapse" data-parent="#accordion_instructions" aria-expanded="true" aria-controls="accordion_qblogger">Blogger Instructions</a>
                        </div>
                        <div class="collapse closer" id="accordion_qblogger" role="tabpanel" aria-labbeledby="accordion_h2" data-parent="#accordion_instructions">
                            <div class="block-content">
                                <ol>
                                    <li>If you don't have a Blogger/Blogspot account yet, click <a class="badge badge-primary" target="_blank" href="https://accounts.google.com/signup/v2/webcreateaccount?service=blogger&continue=https%3A%2F%2Fwww.blogger.com%2Fhome&ltmpl=blogger&flowName=GlifWebSignIn&flowEntry=SignUp">here</a> to register. If you already have a Blogger/Blogspot account, continue to step 2.</li>
                                    <li>Authorize Traffic Genius Pro in your Blogger account. Click <a class="badge badge-warning" target="_blank" href="/blogger/auth">here</a> to authorize.</li>
                                    <li>After authorizing, go to this <a class="badge badge-primary" target="_blank" href="http://blogger.com">link</a> to get your Blogger/Blogspot ID. You should see your Blogger/Blogspot ID on the URL/Address bar in this format: www.blogger.com/blogger.g?blogID=<span class="badge badge-danger">Blogger ID here</span>#allposts</li>
                                    <li>Copy your Blogger ID and then paste it in the "BLOGGER_ID" field above.</li>
                                    <li>Once all steps are done, click "Save".</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="block block-rounded mb-1">
                        <div class="block-header block-header-default" role="tab" id="accordion_h2">
                            <a class="font-w600 text-black" data-toggle="collapse" data-parent="#accordion_instructions" aria-expanded="true" aria-controls="accordion_qtumblr">Tumblr Instructions</a>
                        </div>
                        <div class="collapse closer" id="accordion_qtumblr" role="tabpanel" aria-labbeledby="accordion_h2" data-parent="#accordion_instructions">
                            <div class="block-content">
                                <ol>
                                    <li>If you don't have a Tumblr account yet, click <a class="badge badge-primary" target="_blank" href="https://www.tumblr.com/register">here</a> to register. If you already have an account in Tumblr, continue to step 2.</li>
                                    <li>Login to your Tumblr account then click <a class="badge badge-primary" target="_blank" href="https://api.tumblr.com/console/calls/user/info">here</a> to go to Tumblr API Console.</li>
                                    <li>Once you're in the Tumblr API Console, you need to authorize our app, input this code: <span class="badge badge-danger">CLMDxhY7ME4KhZrbn3bqgAGwb0y7uuNm1pWOvcag2CGBSvITFg</span> in the "Consumer Key" field and this code: <span class="badge badge-danger">IKlRtvxDINH44Wad5PB3sx1miJ0mc5JuPcby7ajzNAn6SUvmz1</span> in the "Consumer Secret" field then click "Authenticate".</li>
                                    <li>After clicking "Authenticate", it will redirect you to another page. Click "Allow" to authorize our app to post to your Tumblr blog.</li>
                                    <li>Once authorized, you will see "Show Keys" in the upper right of Tumblr API Console. Click it and a dialog box will appear.</li>
                                    <li>In the dialog box, copy the "Token" and paste it in the "TUMBLR_TOKEN" field above.</li>
                                    <li>After copying the "Token", copy the "Token Secret" and paste it in the "TUMBLR_TOKEN_SECRET" above.</li>
                                    <li>Once done with "Token" and "Token Secret", get your Tumblr Blog Name by clicking the <i class="fa fa-user"></i> icon in <a target="_blank" class="badge badge-primary" href="https://www.tumblr.com/dashboard">Tumblr</a> dashboard. In the "Tumblrs" section, the first name with a picture is your blog name. Copy it and paste it in the "TUMBLR_BLOG_NAME" field above.</li>
                                    <li>Once all steps are accomplished, click "Save".</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="block block-rounded mb-1">
                        <div class="block-header block-header-default" role="tab" id="accordion_h2">
                            <a class="font-w600 text-black" data-toggle="collapse" data-parent="#accordion_instructions" aria-expanded="true" aria-controls="accordion_qwpblog">WPBlog Instructions</a>
                        </div>
                        <div class="collapse closer" id="accordion_qwpblog" role="tabpanel" aria-labbeledby="accordion_h2" data-parent="#accordion_instructions">
                            <div class="block-content">
                                <small><span class="badge badge-danger">Disclaimer</span> WordPress Blog is not same as your WordPress Website. WordPress Blog is a website derived from <span class="text-info">wordpress.com</span></small>
                                <ol>
                                    <li>If you don't have a WordPress Blog account yet, click <a target="_blank" class="badge badge-primary" href="https://wordpress.com/start/about">here</a> to register. If you already have a WordPress Blog account, continue to step 2.</li>
                                    <li>Login to your WordPress Blog account and click "My Sites" on the upper left of the screen.</li>
                                    <li>Once in the "My Sites" panel, click "People" in the side navigation to get your username.</li>
                                    <li>Copy the username and paste it in the "WPBLOG_USERNAME" field above.</li>
                                    <li>Type your WordPress Blog password in the "WPBLOG_PASSWORD" field above.</li>
                                    <li>To get your WordPress Blog blog name, click "Sites" in the side nagivation. Your blog name should appear, for example "blogname.wordpress.com". Copy it, then paste it in the "WPBLOG_BLOG_NAME" field above.</li>
                                    <li>For the "WPBLOG_CLIENT_ID" and "WPBLOG_CLIENT_SECRET", click <a target="_blank" class="badge badge-primary" href="https://developer.wordpress.com/apps">here</a> and click "Create Application"</li>
                                    <li>Name the application as "Traffic Genius Pro".</li>
                                    <li>Fill out all the URL fields with <span class="badge badge-danger">http://app.trafficgeniuspro.com</span>, leave the "Javascript Origins" blank.</li>
                                    <li>Select the "Web" for appication type and finish out the application creation.</li>
                                    <li>Go back to apps page by clicking <a target="_blank" class="badge badge-primary" href="https://developer.wordpress.com/apps">here</a>.</li>
                                    <li>You should see the "Traffic Genius Pro" app that you have created. Click it and then below, you will see the OAuth Information section.</li>
                                    <li>Copy the Client ID and paste it in the "WPBLOG_CLIENT_ID" above, do the same with the Client Secret and paste it in the "WPBLOG_CLIENT_SECRET" above.</li>
                                    <li>Once all steps are accomplished, click "Save".</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="block block-rounded mb-1">
                        <div class="block-header block-header-default" role="tab" id="accordion_h2">
                            <a class="font-w600 text-black" data-toggle="collapse" data-parent="#accordion_instructions" aria-expanded="true" aria-controls="accordion_qfc2blog">FC2 Blog Instructions</a>
                        </div>
                        <div class="collapse closer" id="accordion_qfc2blog" role="tabpanel" aria-labbeledby="accordion_h2" data-parent="#accordion_instructions">
                            <div class="block-content">
                                <ol>
                                    <li>If you don't have an FC2 Blog account yet, click <a target="_blank" class="badge badge-primary" href="https://blog.fc2.com/en/">here</a> to register. If you already have an FC2 Blog account, continue to step 2.</li>
                                    <li>If you already have an account, enter your credentials above. The only credentials you need is the blog name which you can see in your FC2 blog account</li>
                                    <li>Paste your FC2 blog name in the "FC2_BLOGNAME" field above.</li>
                                    <li>Once all steps are accomplished, click "Save".</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="block block-rounded mb-1">
                        <div class="block-header block-header-default" role="tab" id="accordion_h2">
                            <a class="font-w600 text-black" data-toggle="collapse" data-parent="#accordion_instructions" aria-expanded="true" aria-controls="accordion_qmedium">Medium Instructions</a>
                        </div>
                        <div class="collapse closer" id="accordion_qmedium" role="tabpanel" aria-labbeledby="accordion_h2" data-parent="#accordion_instructions">
                            <div class="block-content">
                                <ol>
                                    <li>If you don't have an account yet in Medium.com, click <a class="badge badge-primary" target="_blank" href="https://medium.com/">here</a> to register. If you already have an account in Medium.com, continue to step 2.</li>
                                    <li>Login to your Medium.com account, then click <a class="badge badge-primary" target="_blank" href="https://medium.com/me/settings">here</a> to go to Medium.com account settings.</li>
                                    <li>Once you're in Medium.com account settings page, scroll down to the bottom and you should see "Integration tokens". Add whatever description you like and click "Get integration token".</li>
                                    <li>Copy the generated code to the "MEDIUM_TOKEN" field above.</li>
                                    <li>Once all steps are done, click "Save".</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="block block-rounded mb-1">
                        <div class="block-header block-header-default" role="tab" id="accordion_h2">
                            <a class="font-w600 text-black" data-toggle="collapse" data-parent="#accordion_instructions" aria-expanded="true" aria-controls="accordion_qyumpu">Yumpu Instructions</a>
                        </div>
                        <div class="collapse closer" id="accordion_qyumpu" role="tabpanel" aria-labbeledby="accordion_h2" data-parent="#accordion_instructions">
                            <div class="block-content">
                                <ol>
                                    <li>If you don't have a Yumpu account yet, click <a target="_blank" class="badge badge-primary" href="https://www.yumpu.com/en/user/registration">here</a> to register. If you already have a Yumpu account, continue to step 2.</li>
                                    <li>Login to your Yumpu account then click <a target="_blank" class="badge badge-primary" href="https://www.yumpu.com/en/account/profile/api">this</a> link to get your Access Token/API Key.</li>
                                    <li>Copy the Access Token/API Key and then paste it in "YUMPU_API_KEY" field above.</li>
                                    <li>Once all steps are accomplished, click "Save".</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="block block-rounded mb-1">
                        <div class="block-header block-header-default" role="tab" id="accordion_h2">
                            <a class="font-w600 text-black" data-toggle="collapse" data-parent="#accordion_instructions" aria-expanded="true" aria-controls="accordion_qwallinside">WallInside Instructions</a>
                        </div>
                        <div class="collapse closer" id="accordion_qwallinside" role="tabpanel" aria-labbeledby="accordion_h2" data-parent="#accordion_instructions">
                            <div class="block-content">
                                <ol>
                                    <li>If you don't have a WallInside account yet, click <a target="_blank" class="badge badge-primary" href="http://wallinside.blog/">here</a> to register. If you already have a WallInside account, continue to step 2.</li>
                                    <li>Input your registered email from WallInside in the "WALLINSIDE_EMAIL" field above.</li>
                                    <li>Input your password from WallInside in the "WALLINSIDE_PASSWORD" field above.</li>
                                    <li>Once all steps are accomplished, click "Save".</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="block block-rounded mb-1">
                        <div class="block-header block-header-default" role="tab" id="accordion_h2">
                            <a class="font-w600 text-black" data-toggle="collapse" data-parent="#accordion_instructions" aria-expanded="true" aria-controls="accordion_qskyrock">SkyRock Instructions</a>
                        </div>
                        <div class="collapse closer" id="accordion_qskyrock" role="tabpanel" aria-labbeledby="accordion_h2" data-parent="#accordion_instructions">
                            <div class="block-content">
                                <ol>
                                    <li>If you don't have a SkyRock account yet, click <a target="_blank" class="badge badge-primary" href="https://www.skyrock.com/subscribe/">here</a> to register. DO NOT USE THE GOOGLE/FACEBOOK REGISTRATION. If you already have a SkyRock account, continue to step 2.</li>
                                    <li>Input your registered username from SkyRock in the "SKYROCK_USERNAME" field above.</li>
                                    <li>Input your password from SkyRock in the "SKYROCK_PASSWORD" field above.</li>
                                    <li>Once all steps are accomplished, click "Save".</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="block block-rounded mb-1">
                        <div class="block-header block-header-default" role="tab" id="accordion_h2">
                            <a class="font-w600 text-black" data-toggle="collapse" data-parent="#accordion_instructions" aria-expanded="true" aria-controls="accordion_qwriteapp">WriteApp Instructions</a>
                        </div>
                        <div class="collapse closer" id="accordion_qwriteapp" role="tabpanel" aria-labbeledby="accordion_h2" data-parent="#accordion_instructions">
                            <div class="block-content">
                                <ol>
                                    <li>If you don't have a WriteApp account yet, click <a target="_blank" class="badge badge-primary" href="https://writeapp.me/register">here</a> to register. If you already have a WriteApp account, continue to step 2.</li>
                                    <li>Input your registered username from WriteApp in the "WRITEAPP_USERNAME" field above.</li>
                                    <li>Input your password from WriteApp in the "WRITEAPP_PASSWORD" field above.</li>
                                    <li>Once all steps are accomplished, click "Save".</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="block block-rounded mb-1">
                        <div class="block-header block-header-default" role="tab" id="accordion_h2">
                            <a class="font-w600 text-black" data-toggle="collapse" data-parent="#accordion_instructions" aria-expanded="true" aria-controls="accordion_qotherarticles">OtherArticles Instructions</a>
                        </div>
                        <div class="collapse closer" id="accordion_qotherarticles" role="tabpanel" aria-labbeledby="accordion_h2" data-parent="#accordion_instructions">
                            <div class="block-content">
                                <ol>
                                    <li>If you don't have an OtherArticles account yet, click <a target="_blank" class="badge badge-primary" href="https://www.otherarticles.com/sign-up.html">here</a> to register. If you already have an OtherArticles account, continue to step 2.</li>
                                    <li>Input your registered username from OtherArticles in the "OTHERARTICLES_USERNAME" field above.</li>
                                    <li>Input your password from OtherArticles in the "OTHERARTICLES_PASSWORD" field above.</li>
                                    <li>Once all steps are accomplished, click "Save".</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="block block-rounded mb-1">
                        <div class="block-header block-header-default" role="tab" id="accordion_h2">
                            <a class="font-w600 text-black" data-toggle="collapse" data-parent="#accordion_instructions" aria-expanded="true" aria-controls="accordion_qlivejournal">LiveJournal Instructions</a>
                        </div>
                        <div class="collapse closer" id="accordion_qlivejournal" role="tabpanel" aria-labbeledby="accordion_h2" data-parent="#accordion_instructions">
                            <div class="block-content">
                                <ol>
                                    <li>If you don't have a LiveJournal account yet, click <a target="_blank" class="badge badge-primary" href="https://www.livejournal.com/create">here</a> to register. If you already have a LiveJournal account, continue to step 2.</li>
                                    <li>Input your registered username from LiveJournal in the "LIVEJOURNAL_USERNAME" field above.</li>
                                    <li>Input your password from LiveJournal in the "LIVEJOURNAL_PASSWORD" field above.</li>
                                    <li>Once all steps are accomplished, click "Save".</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="block block-rounded mb-1">
                        <div class="block-header block-header-default" role="tab" id="accordion_h2">
                            <a class="font-w600 text-black" data-toggle="collapse" data-parent="#accordion_instructions" aria-expanded="true" aria-controls="accordion_qopendiary">OpenDiary Instructions</a>
                        </div>
                        <div class="collapse closer" id="accordion_qopendiary" role="tabpanel" aria-labbeledby="accordion_h2" data-parent="#accordion_instructions">
                            <div class="block-content">
                                <ol>
                                    <li>If you don't have an OpenDiary account yet, click <a target="_blank" class="badge badge-primary" href="https://www.opendiary.com/register/">here</a> to register. If you already have an OpenDiary account, continue to step 2.</li>
                                    <li>Input your registered email from OpenDiary in the "OPENDIARY_EMAIL" field above.</li>
                                    <li>Input your password from OpenDiary in the "OPENDIARY_PASSWORD" field above.</li>
                                    <li>Once all steps are accomplished, click "Save".</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="block block-rounded mb-1">
                        <div class="block-header block-header-default" role="tab" id="accordion_h2">
                            <a class="font-w600 text-black" data-toggle="collapse" data-parent="#accordion_instructions" aria-expanded="true" aria-controls="accordion_qdropspace">DropSpace Instructions</a>
                        </div>
                        <div class="collapse closer" id="accordion_qdropspace" role="tabpanel" aria-labbeledby="accordion_h2" data-parent="#accordion_instructions">
                            <div class="block-content">
                                <ol>
                                    <li>If you don't have a DropSpace account yet, click <a target="_blank" class="badge badge-primary" href="https://dropspace.io/signup/">here</a> to register. If you already have a DropSpace account, continue to step 2.</li>
                                    <li>Input your registered email from DropSpace in the "DROPSPACE_EMAIL" field above.</li>
                                    <li>Input your password from DropSpace in the "DROPSPACE_PASSWORD" field above.</li>
                                    <li>Once all steps are accomplished, click "Save".</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="block block-rounded mb-1">
                        <div class="block-header block-header-default" role="tab" id="accordion_h2">
                            <a class="font-w600 text-black" data-toggle="collapse" data-parent="#accordion_instructions" aria-expanded="true" aria-controls="accordion_qarticleonline">ArticleOnline Instructions</a>
                        </div>
                        <div class="collapse closer" id="accordion_qarticleonline" role="tabpanel" aria-labbeledby="accordion_h2" data-parent="#accordion_instructions">
                            <div class="block-content">
                                <ol>
                                    <li>If you don't have a ArticleOnline account yet, click <a target="_blank" class="badge badge-primary" href="http://www.123articleonline.com/register-member">here</a> to register. If you already have a ArticleOnline account, continue to step 2.</li>
                                    <li>Input your registered email from ArticleOnline in the "ARTICLEONLINE_EMAIL" field above.</li>
                                    <li>Input your password from ArticleOnline in the "ARTICLEONLINE_PASSWORD" field above.</li>
                                    <li>Once all steps are accomplished, click "Save".</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="block block-rounded mb-1">
                        <div class="block-header block-header-default" role="tab" id="accordion_h2">
                            <a class="font-w600 text-black" data-toggle="collapse" data-parent="#accordion_instructions" aria-expanded="true" aria-controls="accordion_qwebmasters">WebMasters Instructions</a>
                        </div>
                        <div class="collapse closer" id="accordion_qwebmasters" role="tabpanel" aria-labbeledby="accordion_h2" data-parent="#accordion_instructions">
                            <div class="block-content">
                                <ol>
                                    <li>Just put in your preferred e-mail for WebMasters in the "WEBMASTERS_EMAIL" field above then click "Save".</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="block block-rounded mb-1">
                        <div class="block-header block-header-default" role="tab" id="accordion_h2">
                            <a class="font-w600 text-black" data-toggle="collapse" data-parent="#accordion_instructions" aria-expanded="true" aria-controls="accordion_qjournalate">Journalate Instructions</a>
                        </div>
                        <div class="collapse closer" id="accordion_qjournalate" role="tabpanel" aria-labbeledby="accordion_h2" data-parent="#accordion_instructions">
                            <div class="block-content">
                                <ol>
                                    <li>If you don't have a Journalate account yet, click <a target="_blank" class="badge badge-primary" href="https://myjournalate.com/home/signup">here</a> to register. DO NOT USE SOCIAL MEDIA REGISTRATION. If you already have a Journalate account, continue to step 2.</li>
                                    <li>Input your registered email from Journalate in the "JOURNALATE_EMAIL" field above.</li>
                                    <li>Input your password from Journalate in the "JOURNALATE_PASSWORD" field above.</li>
                                    <li>Once all steps are accomplished, click "Save".</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="block block-rounded mb-1">
                        <div class="block-header block-header-default" role="tab" id="accordion_h2">
                            <a class="font-w600 text-black" data-toggle="collapse" data-parent="#accordion_instructions" aria-expanded="true" aria-controls="accordion_qdojopress">DojoPress Instructions</a>
                        </div>
                        <div class="collapse closer" id="accordion_qdojopress" role="tabpanel" aria-labbeledby="accordion_h2" data-parent="#accordion_instructions">
                            <div class="block-content">
                                <ol>
                                    <li>If you don't have a DojoPress account yet, click <a target="_blank" class="badge badge-primary" href="http://www.dojo.press/login">here</a> to register. If you already have a DojoPress account, continue to step 2.</li>
                                    <li>Input your registered username from DojoPress in the "DOJOPRESS_USERNAME" field above.</li>
                                    <li>Input your password from DojoPress in the "DOJOPRESS_PASSWORD" field above.</li>
                                    <li>Once all steps are accomplished, click "Save".</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="block block-rounded mb-1">
                        <div class="block-header block-header-default" role="tab" id="accordion_h2">
                            <a class="font-w600 text-black" data-toggle="collapse" data-parent="#accordion_instructions" aria-expanded="true" aria-controls="accordion_qhowtoadvice">HowToAdvice Instructions</a>
                        </div>
                        <div class="collapse closer" id="accordion_qhowtoadvice" role="tabpanel" aria-labbeledby="accordion_h2" data-parent="#accordion_instructions">
                            <div class="block-content">
                                <ol>
                                    <li>Just put in your preferred e-mail for HowToAdvice in the "HOWTOADVICE_EMAIL" field above then click "Save".</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="block block-rounded mb-1">
                        <div class="block-header block-header-default" role="tab" id="accordion_h2">
                            <a class="font-w600 text-black" data-toggle="collapse" data-parent="#accordion_instructions" aria-expanded="true" aria-controls="accordion_qsharefile">Sharefile Instructions</a>
                        </div>
                        <div class="collapse closer" id="accordion_qsharefile" role="tabpanel" aria-labbeledby="accordion_h2" data-parent="#accordion_instructions">
                            <div class="block-content">
                                <ol>
                                    <li>If you don't have a ShareFile account yet, click <a target="_blank" class="badge badge-primary" href="https://www.sharefile.com/">here</a> to register. If you already have a ShareFile account, continue to step 2.</li>
                                    <li>You once account was created, you should be able to get your host name upon login, e.g. trafficgeniuspro.sharefile.com</li>
                                    <li>Input your email and password in the fields for ShareFile.</li>
                                    <li>For the Folder ID, you should get it from your hostname, under Folders> Personal Folders> Folder Details. It should appear as hostname.sharefile.com/f/**folder-id-here**</li>
                                    <li>Once all steps are accomplished, click "Save".</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="block block-rounded mb-1">
                        <div class="block-header block-header-default" role="tab" id="accordion_h2">
                            <a class="font-w600 text-black" data-toggle="collapse" data-parent="#accordion_instructions" aria-expanded="true" aria-controls="accordion_qdropbox">DropBox Instructions</a>
                        </div>
                        <div class="collapse closer" id="accordion_qdropbox" role="tabpanel" aria-labbeledby="accordion_h2" data-parent="#accordion_instructions">
                            <div class="block-content">
                                <ol>
                                    <li>If you don't have a DropBox account yet, click <a target="_blank" class="badge badge-primary" href="https://www.dropbox.com/">here</a> to register. If you already have a DropBox account, continue to step 2.</li>
                                    <li>Login to your DropBox account then click <a target="_blank" class="badge badge-primary" href="https://www.dropbox.com/">here</a>.</li>
                                    <li>When you are on the App Creation page for DropBox, select "DropBox API", then choose "App Folder", then input a name for your app, check the Agreement of Terms, then click "Create app" button.</li>
                                    <li>After the app has been created, you will be taken to the app page. Here you can adjust the settings of your app but all you need to do is scroll down and click the "Generate" button on the "Generate access token" section of the application page.</li>
                                    <li>Copy the generated token and paste it on the Dropbox Token field.</li>
                                    <li>Once all steps are accomplished, click "Save".</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="block block-rounded mb-1">
                        <div class="block-header block-header-default" role="tab" id="accordion_h2">
                            <a class="font-w600 text-black" data-toggle="collapse" data-parent="#accordion_instructions" aria-expanded="true" aria-controls="accordion_qappbox">AppBox Instructions</a>
                        </div>
                        <div class="collapse closer" id="accordion_qappbox" role="tabpanel" aria-labbeledby="accordion_h2" data-parent="#accordion_instructions">
                            <div class="block-content">
                                <ol>
                                    <li>If you don't have an AppBox account yet, click <a target="_blank" class="badge badge-primary" href="https://account.box.com/login">here</a> to register. You can also sign up with you Google account if you want. If you already have an AppBox account, continue to step 2.</li>
                                    <li>Sign in to your AppBox account then click <a target="_blank" class="badge badge-primary" href="https://app.box.com/developers/console/newapp">here</a>.</li>
                                    <li>Once in the app creation page, click "Custom App" then hit next.</li>
                                    <li>After hitting next, select "OAuth 2.0 with JWT(Server Authentication)", then hit next.</li>
                                    <li>Add an app name when asked, then click "Create App".</li>
                                    <li>After the app creation, you'll be directed to the app page, there you will see a box. On the green text, copy the code after the word "Bearer".</li>
                                    <li>Paste the code on the AppBox Token field.</li>
                                    <li>Once all steps are accomplished, click "Save".</li>
                                </ol>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('.opener').on('click', function () {
            Array.from(document.getElementsByClassName('closer')).forEach(function (element) {
                element.classList.remove('show');
            });
            var instruct_id = 'accordion_q'+$(this).data('opener').toLowerCase();
            var elem_id = $(this).data('clicker');
            if($('#'+elem_id).hasClass('show')){
                document.getElementById(instruct_id).classList.remove('show');
            }else{
                document.getElementById(instruct_id).classList.add('show');
            }
        });
        $('.instruction').on('click', function () {
            var instruction_name = $(this).data('name');
            console.log(instruction_name);
            window.open("{{ route('show.instruction') }}/"+instruction_name, "pop", "width=600, height=400, scrollbars=no");
        });
    });
</script>
@endsection
