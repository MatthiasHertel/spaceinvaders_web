@extends('layouts.app')

@section('content')
{{-- some dirty inline styles  --}}
<style>
#content { padding:5px; background:#ddd; border-radius:5px; overflow-y: scroll;
           border:1px solid #CCC; margin-top:10px; height: 320px; }
#input { border-radius:2px; border:1px solid #ccc;
         margin-top:10px; padding:5px; width:400px;  }
#status { width:88px; display:block; float:left; margin-top:15px; }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Websocket Chat</div>

                <div class="panel-body">
                    <div id="content"></div>
                    <div>
                        <span id="status">Connecting...</span>
                        <input type="text" id="input" disabled="disabled" />
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="/js/chat-frontend.js"></script>
@endsection
