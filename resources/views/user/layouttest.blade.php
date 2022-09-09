<!doctype html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
 


    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">
    <link href="{{ asset('assets/admin/css/icon.css') }}" rel="stylesheet">
    <style>
        .main-nav {
            display: flex;
            border-radius: 3px;
            padding: 2em;
            font-family: sans-serif;
        }

        .main-nav > form {
            display: flex;
            justify-content: flex-end;
            flex: 1;
        }

        .main-nav button {
            background: white;
            border: 0;
            border-radius: 1em;
            color: orangered;
            padding: 0 1em;
            margin-left: .3em;
        }
        @media screen and (max-width: 575px) {
            .main-nav {
                flex-direction: column;
            }
            .main-nav ul {
                flex-direction: row; /* Change this to 'column' to stack the links */
                margin-bottom: 1em;
            }
        }
        .btn-w{
            width: 300px;
        }
        .swiper {
            width: 98vw;
            height: calc(100vh - 100px);
        }


        .image-open{
            animation: scaleUp 0.2s forwards linear;
        }

        .zooming:hover{
        cursor: pointer;
        }

        @keyframes scaleUp{
        from{
            width:100%;
        }to{
            width:1000px;
            height: 100%;
            top:0;
            left:0;
            display:fixed;
        }
        }

    </style>
    @yield('head_script')

</head>
<body class="bg-secondary text-white">
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-6 bg-secondary bg-gradient text-white border-bottom shadow-sm" style="background: #2d048d; padding: .1rem; max-height: 80px;">
    @yield('progress')
</div>

<div class="mt-1 p-0 ">
    @yield('main_content')

    
</div>



@yield('scriptams')
<script>
    "use strict"; 
    window.onbeforeunload = function() { return "Your work will be lost."; };
    window.onpopstate = () => history.forward();
  //  console.log('aassdd jjjj');
    if (document.querySelector('.swiper')){
      console.log('yra swiperis');
 
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            
            direction: 'horizontal',
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
               //type: "progressbar",
                clickable: true,
                renderBullet: function (index, className) {
                    return '<span class="' + className + '">' + (index + 1) + "</span>";
                },
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            // scrollbar: {
            //     el: '.swiper-scrollbar',
            // },
        });
        
        // $next=document.querySelector('.swiper-button-next');
        // $next.addEventListener('click', function () {
        //     @php

        //     @endphp
        // });

            var laikas =document.querySelector('input[name=laikas]').value;
            

            var viso = laikas*60, timer = laikas*60;
            var prbar = document.querySelector('.progress-bar');
            const $root = document.querySelectorAll('[data-kl-nr]');

            var form=document.querySelector('.form_test');
//timer=10;

            //console.log($root);

            // for (var i in $root) if ($root.hasOwnProperty(i)) {
            //     alert($root[i].getAttribute('data-kl-id'));
            // }

            // const $
            //var timer = 30;    //your timer length
            // window.onbeforeunload = function() { return "Jūsų testo rezultatai bus prarasti. Ar tikrai to norite?"; };
            // history.pushState(null, null, window.location.href);
            // history.back();

            //function disableF5(e) { if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) e.preventDefault(); };

            //document.addEventListener('keydown', disableF5);

            if( !window.localStorage.getItem('laikas')  ){
                prbar.innerHTML = timer+' s';
                prbar.style.width = timer*100/viso+'%';
                window.localStorage.setItem('laikas', timer);
            }
            // Apsauga nuo F5
            var myVar = setInterval(function() {
                //code
                //console.log(prbar.innerHTML);
                timer = window.localStorage.getItem('laikas');
                prbar.innerHTML =Math.floor(timer / 60)+' min '+ (timer % 60)+' s';
                prbar.style.width = timer*100/viso+'%';
                --timer;
                window.localStorage.setItem('laikas', timer);
                if (timer < 0) {
                    clearInterval(myVar);
                    window.localStorage.removeItem('laikas');
                    form.submit();
                    //window.location = "/endtest";
                }
            }, 1000);

    };
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    //     document.querySelectorAll("input[type=checkbox]").forEach(function (e) {
    //         //e.value = window.sessionStorage.getItem(e.name, e.value);
    //         /////window.sessionStorage.setItem(e.getAttribute('data-kl-nr'),e.getAttribute('data-kl-id') );
    //         // e.addEventListener('click', function () {
    //         //     window.sessionStorage.setItem(e.name, e.value);
    //         //     alert('ddd');
    //         // })
    //         window.sessionStorage.setItem(e.getAttribute('data-atsak'),e.getAttribute('data-kl-atsak') );
    //         e.addEventListener('change', e => {
    //
    //             if(e.target.checked){
    //                 window.sessionStorage.setItem(e.getAttribute('data-ats'),e.getAttribute('data-kl-atsak') );
    //             }
    //
    //         });
    //     })
        // history.pushState(null, null, document.title);
        // window.addEventListener('popstate', function () {
        //     history.pushState(null, null, document.title);
        // });


        //  document.querySelectorAll(".zooming").forEach( img =>
//         img.addEventListener("click", () =>img.classList.toggle("image-open")) 
//         )

//     

    // $(".post .zooming").click(function () {
    //     var $src = $(this).attr("src");
    //     $(".show").fadeIn();
    //     $(".img-show img").attr("src", $src);
    // });
    
    // $("span, .overlay").click(function () {
    //     $(".show").fadeOut();
    // });
    ////////////////////////////////////////////////////////////////

    // $(window).scroll(function(){
    //   if(this.scrollY > 20){
    //     $(".goTop").fadeIn();
    //   }
    //   else{
    //     $(".goTop").fadeOut();
    //   }
    // });
    // var goTop =document.querySelector('.goTop').value;
    // goTop.click(function(){window.scrollTo(0,0);});
    


if (document.querySelector('.scroll')){
    var doc = document.documentElement;
    var top = (window.pageYOffset || doc.scrollTop)  - (doc.clientTop || 0);
    var goTop =document.querySelector('.goTop');
    window.addEventListener('scroll', function() {
        console.log(window.pageYOffset);
            if (window.pageYOffset>200) {
                goTop.classList.add('rodyti');
            }
            else{
                goTop.classList.remove('rodyti');
            }
    });
    
    document.querySelector(".goTop").addEventListener("click", function(){
 
            window.scrollTo(0,0);
        
      //  console.log(top);
        //
    });
};
  
});
// $(function () {
//     "use strict";
    
//     $(".popup img").click(function () {
//         var $src = $(this).attr("src");
//         $(".show").fadeIn();
//         $(".img-show img").attr("src", $src);
//     });
    
//     $("span, .overlay").click(function () {
//         $(".show").fadeOut();
//     });
    
// });
    // function preventBack() {
    //     window.history.forward();
    // }

    // setTimeout("preventBack()", 0);
    // window.onunload = function() {
    //     null
    // };
    
    

    // function save_kl(kk) {
    //   //  document.querySelectorAll(".task input").forEach(function (e) {
    //   //      if (e.checked) {
    //   //          //alert('sss');
    //  //       }
    //         window.sessionStorage.setItem(e.getAttribute('data-atsak'),e.getAttribute('data-kl-atsak')) });
    // }


   

    // $prev=document.querySelector('.swiper-button-prev');
    // $prev.addEventListener('click', function () {
    //     save_kl('Prev');
    // });
   

</script>
</body>
</html>
