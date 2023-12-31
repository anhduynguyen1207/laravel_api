@extends('layout')
@section('details')
<!--start-single-->
<div class="single">
    <div class="container">
            <div class="single-top">
                    <img class="img-responsive" src="{{URL::asset('public/uploads/'.$postDetail->image)}}" alt=" ">
                <div class=" single-grid">
                    <h4>{{$postDetail->title}}</h4>				
                        <ul class="blog-ic">
                            <li><a href="#"><span> <i  class="glyphicon glyphicon-user"> </i>{{$postDetail->category->title}}/span> </a> </li>
                            <li><span><i class="glyphicon glyphicon-time"> </i>June 14, 2013</span></li>		  						 	
                            <li><span><i class="glyphicon glyphicon-eye-open"> </i>Hits:145</span></li>
                        </ul>		  						
                    <p>{!!$postDetail->short_desc!!}</p>
                    <p>{!!$postDetail->desc!!}</p>
                </div>
                <div class="comments heading">
                    <h3>Comments</h3>
                    <div class="media">
                          <div class="media-body">
                            <h4 class="media-heading">	Richard Spark</h4>
                            <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs .  </p>
                          </div>
                      <div class="media-right">
                        <a href="#">
                            <img src="images/si.png" alt=""> </a>
                      </div>
                 </div>
                  <div class="media">
                      <div class="media-left">
                        <a href="#">
                            <img src="images/si.png" alt="">
                        </a>
                      </div>
                      <div class="media-body">
                        <h4 class="media-heading">Joseph Goh</h4>
                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs .  </p>
                      </div>
                    </div>
                </div>
                <div class="comment-bottom heading">
                    <h3>Leave a Comment</h3>
                    <form>	
                    <input type="text" value="Name" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Name';}">
                    <input type="text" value="Email" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Email';}">
                    <input type="text" value="Subject" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='Subject';}">
                    <textarea cols="77" rows="6" value=" " onfocus="this.value='';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
                        <input type="submit" value="Send">
                </form>
                </div>
            </div>	
        </div>					
</div>
<!--end-single-->
@endsection