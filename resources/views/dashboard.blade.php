<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" >
                <div class="p-6 bg-white border-b border-gray-200"> <br>
                   <b style="margin-left: 10px">You're logged in!</b>
                </div> <br>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
               <div class="card-header">
                    <legend style="align-content: center">Business Insights</legend>
               </div><br>
               <div class="card-body">
                   <div class="form-group">
                       <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <b>What is a Business Person</b>
                                    </div>
                                    <div class="card-body">
                                        <p>A business Person, also known as a business professional or entreprenuer, is an individual involved
                                            in various business activities and ventures. They are typically responsible for establishing, managing
                                            and growing businesses or organisations with the go.
                                            <p class="extra-content">They play a crucial role in decision-making, resource allocation, and strategic planning. Business people often possess strong leadership and communication skills and are adept at identifying opportunities and mitigating risks. They may specialize in a particular industry or operate across multiple sectors. Successful business people are often driven, innovative, and adaptable, continuously seeking ways to drive growth and achieve success in their ventures.</p>
                                            <button class="btn btn-primary read-more-btn">Read more</button>                                        </p>


                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <b>What is Sales Forecasting</b>
                                    </div>
                                    <div class="card-body">
                                        <p>sales forecasting refers to the process of estimating or predicting future sales volumes and revenue.
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, omnis!</p>
                                            <p class="extra-content">They play a crucial role in decision-making, resource allocation, and strategic planning. Business people often possess strong leadership and communication skills and are adept at identifying opportunities and mitigating risks. They may specialize in a particular industry or operate across multiple sectors. Successful business people are often driven, innovative, and adaptable, continuously seeking ways to drive growth and achieve success in their ventures.</p>
                                            <button class="btn btn-primary read-more-btn">Read more</button>                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <b>What is Cashflow?</b>
                                    </div>
                                    <div class="card-body">
                                        <p>Cashflow refers to the movement of money into and out of a business or individuals's finances over a period of time.
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, sit?
                                            <p class="extra-content">They play a crucial role in decision-making, resource allocation, and strategic planning. Business people often possess strong leadership and communication skills and are adept at identifying opportunities and mitigating risks. They may specialize in a particular industry or operate across multiple sectors. Successful business people are often driven, innovative, and adaptable, continuously seeking ways to drive growth and achieve success in their ventures.</p>
                                            <button class="btn btn-primary read-more-btn">Read more</button>                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <b>Break Even Analysis</b>
                                    </div>
                                    <div class="card-body">
                                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt modi tenetur, culpa illum accusantium at eligendi
                                             sed distinctio eius sint veritatis, voluptatem iure labore officiis.</p>
                                             <p class="extra-content">They play a crucial role in decision-making, resource allocation, and strategic planning. Business people often possess strong leadership and communication skills and are adept at identifying opportunities and mitigating risks. They may specialize in a particular industry or operate across multiple sectors. Successful business people are often driven, innovative, and adaptable, continuously seeking ways to drive growth and achieve success in their ventures.</p>
                                             <button class="btn btn-primary read-more-btn">Read more</button>                                    </div>
                                </div>
                            </div>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </div>
    <style>
        .card {
          transition: height 0.3s;
          overflow: hidden;
        }

        .card.expand {
          height: auto;
        }

        .card .extra-content {
          display: none;
        }

        .card.expand .extra-content {
          display: block;
        }
      </style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
      var cards = document.querySelectorAll('.card');
      var readMoreBtns = document.querySelectorAll('.read-more-btn');

      readMoreBtns.forEach(function(btn, index) {
        btn.addEventListener('click', function() {
          var card = btn.closest('.card');
          card.classList.toggle('expand');
          if (card.classList.contains('expand')) {
            btn.textContent = 'Read less';
          } else {
            btn.textContent = 'Read more';
          }
        });
      });
    });
  </script>
</x-app-layout>
