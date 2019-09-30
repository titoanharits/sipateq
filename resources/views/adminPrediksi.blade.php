@extends('layouts.base-dashboard')
@section('title')
Prediksi
@endsection


@section('content')
<div class="mt mb col-md-12">
  <div class="border-head">
    <h3>Data Hasil Produksi</h3>
  </div>

  <!--CUSTOM CHART START -->
  <div class="custom-bar-chart">
    <ul class="y-axis">
      <li><span>10.000</span></li>
      <li><span>8.000</span></li>
      <li><span>6.000</span></li>
      <li><span>4.000</span></li>
      <li><span>2.000</span></li>
      <li><span>0</span></li>
    </ul>
    <div class="bar">
      <div class="title">JAN</div>
      <div class="value tooltips" data-original-title="8.500" data-toggle="tooltip" data-placement="top">85%</div>
    </div>
    <div class="bar ">
      <div class="title">FEB</div>
      <div class="value tooltips" data-original-title="5.000" data-toggle="tooltip" data-placement="top">50%</div>
    </div>
    <div class="bar ">
      <div class="title">MAR</div>
      <div class="value tooltips" data-original-title="6.000" data-toggle="tooltip" data-placement="top">60%</div>
    </div>
    <div class="bar ">
      <div class="title">APR</div>
      <div class="value tooltips" data-original-title="4.500" data-toggle="tooltip" data-placement="top">45%</div>
    </div>
    <div class="bar">
      <div class="title">MAY</div>
      <div class="value tooltips" data-original-title="3.200" data-toggle="tooltip" data-placement="top">32%</div>
    </div>
    <div class="bar ">
      <div class="title">JUN</div>
      <div class="value tooltips" data-original-title="6.200" data-toggle="tooltip" data-placement="top">62%</div>
    </div>
    <div class="bar">
      <div class="title">JUL</div>
      <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
    </div>
  </div>
  <!--custom chart end-->
</div>

<div class="col-md-12">
  <div class="dmbox">
    <div class="goleft border-head">
      <h2>Hasil Prediksi</h2>
    </div>
    <div class="goleft accordion" id="accordion2">
              <div class="accordion-group">
                <div class="accordion-heading">
                  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="faq.html#collapseOne" aria-expanded="true">
                    <em class="glyphicon glyphicon-chevron-right icon-fixed-width"></em>Prediksi Produksi yang Harus dilakukan untuk bulan depan
                    </a>
                </div>
                <div id="collapseOne" class="accordion-body collapse" aria-expanded="false" style="height: 0px;">
                  <div class="accordion-inner">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                      specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                  </div>
                </div>
              </div>




            </div>


  </div>
</div>
@endsection
