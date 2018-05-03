@extends('layouts.app')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/modeledit.css')}}">
@endsection
@section('scripts')
<script type="text/javascript" src="{{asset('js/modeledit.js')}}"></script>
@endsection
@section('content')   
  <?php $limit = session()->get('limit');?>
   <div class="container">
     <div class="col-md-12">        
       <div class="panel panel-primary">
          <div class="panel-heading">           
              <h4> <i class="fa fa-hand-pointer-o" aria-hidden="true"></i> Select one or more models of vehicle(s) @if($limit['limit_make'] == 0) (No limit) @else (Maximum of {{$limit['limit_model']}} model(s) can be selected) @endif </h4>           
          </div>
        
          <input type="hidden" id="model_limit" value="{{$limit['limit_model']}}">
          <div class="panel-body">               
              <div class="table-responsive">
                  <table class="table table-inverse table-bordered" id="service_body"> 
                     <thead>
                      <tr>
                        <td>No</td>              
                        <td>Year</td>
                        <td>Make</td>
                        <td>Model</td>                   
                        <td>Select</td>
                      </tr>
                     </thead>
                     <tbody>              
                      <?php $count = 1; ?>
                      @foreach($cars as $item)
                        <tr>
                          <td>{{$count ++}}</td>             
                          <td>{{$item['year']}}</td>
                          <td>{{$item['make']}}</td>
                          <td>{{$item['model']}}</td>
                          <td class="model-selection">                       
                             <input id="model{{$count}}" type="checkbox" value="{{$item['model']}}" />
                             <label for="model{{$count}}"></label>                      
                          </td>                     
                        </tr>
                      @endforeach 
                    </tbody>
                  </table>
              </div>
              <div class="col-md-3 col-md-offset-5">
                <button class="btn btn-primary" style="margin-top:30px;" id="term_selection"> Next <i class="fa fa-hand-pointer-o" aria-hidden="true"></i></button>
              </div>
          </div>
       </div>
      </div>    
      <div class="text-center" style="margin-top: 20px;">
        <span class="rating"></span>&nbsp<span id="text-inform">Click next to select trim of vehicle(s)</span>
      </div>     
   </div>
   
   <div class="remodal" data-remodal-id="modal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
    <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
      <div>
        <h2 id="modal1Title">Warning</h2>
        <p id="modal1Desc">
           You must select one car information at least !
        </p>
      </div>
    <br>
    <button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
    <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
  </div>
  <div class="remodal" data-remodal-id="modal1" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
    <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
      <div>
        <h2 id="modal1Title">Warning</h2>
        <p id="modal1Desc">
     
            Maximum {{$limit['limit_model']}} model can be selected 
        </p>
      </div>
    <br>
    <button data-remodal-action="cancel" class="remodal-cancel">Cancel</button>
    <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
  </div>
@endsection