<!doctype html>

<html>
<head>
@include('layouts.head')
</head>

<body>

<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="cover-container">
            <header class="masthead clearfix">
                <div class="inner tool_header">
                    @if($authId != null)
                        @include('layouts.header_in')
                    @else()
                        @include('layouts.header_out')
                    @endif
                </div>
            </header>
            <div class="content" id="content">
                @if($authId != null)
                    @include('home')
                @else
                    @include('auth.login')
                @endif
            </div>
        </div>
    </div>
</div>
</body>
</html>
