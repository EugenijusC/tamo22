
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Testas</title>
    <link type="text/css" rel="stylesheet" href="https://cdn.jotfor.ms/themes/CSS/5e6b428acc8c4e222d1beb91.css?themeRevisionID=5f30e2a790832f3e96009402"/>

    <style type="text/css" id="form-designer-style">
        /* Injected CSS Code */
        .form-label.form-label-auto {

            display: inline-block;
            float: left;
            text-align: left;

        }
        .form-all {
            border-radius: 3px;
            box-shadow: 0 4px 4px rgb(87 100 126 / 21%);
            background-color: #fff;
            max-width: 752px;
        }

        .form-all {
            border-radius: 3px;
            box-shadow: 0 4px 4px rgb(87 100 126 / 21%);
            background-color: #fff;
            max-width: 752px;
        }
        .form-all {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            margin: 72px auto;
            width: 100%;
        }
        *, :after, :before {
            box-sizing: border-box;
        }
        *, :after, :before {
            box-sizing: border-box;
        }
        ul.page-section {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: start;
            align-items: flex-start;
            margin: 0;
            padding: 0 38px;
            list-style: none;}

        li[data-type=control_head] {
            list-style: none;
        }
        .form-input-wide {
            width: 100%;
        }
        *, :after, :before {
            box-sizing: border-box;
        }
        user agent stylesheet
        li {
            display: list-item;
            text-align: -webkit-match-parent;
        }
        div.header-large {
            margin: 0 -38px;
            padding: 2.5em 52px;
        }
        .header-large {
            border-color: #d7d8e1;
        }


        .page-section>li:first-child:not(.form-line-column):not([data-type=control_head]):not([data-type=control_text]):not([data-type=control_button]):not([data-type=control_collapse]), .page-section>li:nth-child(2):not(.form-line-column):not([data-type=control_head]):not([data-type=control_text]):not([data-type=control_button]):not([data-type=control_collapse]) {
            margin-top: 28px;
        }
        .form-line {
            margin-top: 12px;
            margin-bottom: 12px;
        }
        .form-line, ul.page-section {
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }
        .form-line {
            padding: 12px 10px;
            margin: 12px 4px;
            border-radius: 3px;
            position: relative;
            width: 100%;
            transition: background-color .15s;
        }

        .form-line, [data-wrapper-react=true] {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: start;
            align-items: flex-start;
        }
        .form-radio+label, .form-radio+span {
            color: #2c3345;
        }
        .form-radio+label, .form-radio+span {
            display: inline-block;
        }
        .form-checkbox+label, .form-checkbox+span, .form-radio+label, .form-radio+span {
            padding-left: 30px;
            min-height: 20px;
            font-size: .9375em;
            position: relative;
            cursor: pointer;
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;
            word-break: break-word;
        }

        .form-checkbox-item label, .form-radio-item label {
            width: 100%;
            padding-right: 5px;
            word-break: break-word;
        }
        .form-submit-button-book_blue2.form-pagebreak-back, .form-submit-button-book_blue2.form-pagebreak-next, .form-submit-button-book_blue2.submit-button {
            color: #fff;
            text-shadow: 0 -1px 0 #142353;
            border: 1px solid #3d4f8b;
            box-shadow: inset 0 0 0 1px rgb(147 187 255 / 30%), 0 2px 2px 0 rgb(0 0 0 / 30%);
            background: linear-gradient(
                    0deg
                    ,#5277c8 0,#305096);
        }

        .jf-form-buttons:not(.form-pagebreak-back) {
            margin-left: 10px;
        }
        .formFooter-button, .submit-button {
            background-color: #18bd5b;
            border-color: #18bd5b;
            color: #fff;
        }
        .jf-form-buttons {
            border-color: #c3cad8;
        }
        .submit-button {
            width: auto;
            min-width: 180px;
        }
        .jf-form-buttons {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-pack: center;
            justify-content: center;
            height: 3em;
            width: auto;
            min-width: 128px;
            color: #2c3345;
            font-size: 1em;
            border-radius: 4px;
            background-color: transparent;
            border: 1px solid;
            cursor: pointer;
            font-weight: 500;
        }
        /* Injected CSS Code */
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body class="bg-secondary">

@if (Route::has('login'))

    @auth

    @else
        <script type="text/javascript">location.href = '/login';</script>

    @endauth
@endif

<div class="bg-secondary">
    <a class="btn btn-warning" href="/start">Į pradžią</a>
<form class="jotform-form" action="/testas/start" method="post" accept-charset="utf-8" autocomplete="on">

    @csrf
    <div role="main" class="form-all ">
        <ul class="form-section page-section">
            <li id="cid_9" class="form-input-wide" data-type="control_head">
                <div class="form-header-group  header-large">
                    <div class="header-text httal htvam">
                        <h1 id="header_9" class="form-header" data-component="header">
                            Testo tipas
                        </h1>
                    </div>
                </div>
            </li>
            <li class="form-line" data-type="control_radio" id="id_8">
                <label class="form-label form-label-left form-label-auto" id="label_8" for="input_8"> Testo tipas </label>
                <div id="cid_8" class="form-input" data-layout="full">
                    <div class="form-single-column" role="group" aria-labelledby="label_8" data-component="radio">
            <span class="form-radio-item" style="clear:left" >
              <span class="dragger-item">
              </span>
              <input type="radio" class="form-radio" id="input_8_0" name="testoTipas"  value="S"  />
              <label id="label_input_8_0" for="input_8_0"> Standartinis </label>
            </span>
            <span class="form-radio-item" style="clear:left">
              <span class="dragger-item">
              </span>
              <input type="radio" class="form-radio" id="input_8_1" name="testoTipas" checked="" value="N" />
              <label id="label_input_8_1" for="input_8_1"> Naujienos </label>
            </span>

            <span class="form-radio-item" style="clear:left; " hidden>
              <span class="dragger-item">
              </span>
              <input type="radio" class="form-radio" id="input_8_2" name="testoTipas" value="P" />
              <label id="label_input_8_2" for="input_8_2"> Specialus </label>
            </span>
                    </div>
                </div>
            </li>
            <li class="form-line" data-type="control_button" id="id_2">
                <div id="cid_2" class="form-input-wide" data-layout="full">
                    <div data-align="auto" class="form-buttons-wrapper form-buttons-auto   jsTest-button-wrapperField">
                        <button id="input_2" type="submit" class="form-submit-button form-submit-button-book_blue2 submit-button jf-form-buttons jsTest-submitField" data-component="button" data-content="">
                            Pradėti
                        </button>
                    </div>
                </div>
            </li>

        </ul>




</form>


</div>

</body>
</html>