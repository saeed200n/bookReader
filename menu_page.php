
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title></title>
  <link name="xc" rel="stylesheet" href=<?php echo plugins_url().'/asset/Style_plugin.css'?>>
  <style>
            @import url('https://v1.fontapi.ir/css/IranNastaliq');
            *, *:before, *:after {
              box-sizing: border-box;

            }
            .boxP li,.boxP .w0,.boxP #btnMenu,.boxP #alarm,.boxP h1,#tableBooks th,#tableBooks .btns{
              font-family: Iran Nastaliq;
            }
    .boxP .we0{
      font-family: Arial;
      letter-spacing: 0.6px;
    }
            div#tableBooks {
              display: flex;
              justify-content: center;
            }
    #toplevel_page_bookReaderId .wp-menu-name{
      font-family: 'Iran Nastaliq';
      margin-right:0.6rem;
    }
        .boxP .x1 {
            width: 200px;
            height: 100px;
            border: 1px solid #999;
            border-radius: 5px;
            background: #ccc;
            margin: auto;
        }

        .boxP .x1 > a {
            display: block;
            width: 100%;
            height: 100%;
            text-align: center;
            line-height: 92px;
            font-size: 20pt;
        }

        /*page full*/
       .boxP header {
            width: 900px;
            height: 150px;
            margin: auto;
            border: solid 1px rgba(0, 0, 0, .5);
        }

       .boxP .left {
          width: 730px;
          max-height: 650px;
          float: left;
          border: solid 1px #ccc;
          padding: .5rem;
          border-radius: .4rem;
         overflow-y: scroll;
         overflow-x: hidden;
        }

        .boxP .right {
          width: 170px;
          max-height: 600px;
          float: left;
          border: solid 1px #ccc;
          padding: 0.2rem;
          border-radius: .4rem;
        }

        .boxP section {
            width: 900px;
            margin: auto;
        }

        .boxP footer {
            width: 900px;
            height: 150px;
            margin: auto;
            clear: both;
            border: solid 1px rgba(0, 0, 0, .5);
        }

        .boxP .menu_plugin > ul {
            padding: 0;
        }

        .boxP .menu_plugin > ul li {
            height: 40px;
            background-color: #cb98c7;
            text-align: center;
            line-height: 40px;
            font-size: 12pt;
            transition: all .2s ease-in-out;
            list-style: none;
            margin-bottom: 5px;
            border-radius: .4rem;
        }

        .boxP .menu_plugin > ul li:hover {
            background-color: #aaabcb;
            margin-right: 5px;
            cursor: pointer;
        }

       .boxP .hide {
            display: none;
        }

        .boxP form.FormCrm {
            direction: ltr;
            margin: auto;
            width: 402px;
        }

        .boxP form.FormCrm label {
            letter-spacing: 1px;
        }

       .boxP form.FormCrm input[type=text] {
            display: block;
            width: 400px;
            margin-bottom: 10px;
            border: 1px solid #999;
        }

        .boxP form.FormCrm input[type=text]:focus {
            border-color: #999 !important;
            box-shadow: unset !important;
        }

        .boxP form.FormCrm input[type=submit] {
            display: block;
            width: 120px;
            height: 50px;
            margin-left: 282px;
            cursor: pointer;
        }

        .boxP [class*='des'] h1 {
            margin: 15px auto;
            width: 180px;
        }

      /*  *::-moz-selection {
            background: none repeat scroll 0 0 #d5d4d2;
            color: #fff;
            text-shadow: none;
        }

        ::-moz-selection {
            background: #ffdca9;
            color: #000;
        }

        ::selection {
            background: #ffdca9;
            color: #000;
        }
    */

        root {
            display: block;
        }

        body {
            display: block;
            margin: auto;
            direction: rtl;
        }

        .boxP .boxM section.form {
            display: flex;
            flex-direction: column;
            width: 20rem;
            margin: auto;
        }

       .boxP .boxM h1 {
            margin: 1rem auto;
            display: flex;
           font-family: Iran Nastaliq;
            justify-content: center;
            font-size: 19pt;
        }

       .boxP .boxs {
            margin: 6rem auto 0;
            box-shadow: 0 0 5px #999;
            padding: 1rem;
            border-radius: 0.2rem;
        }

       .boxP .boxM {
            width: 30rem;

        }

        .boxM .inpts,.boxM .inpts2 {
            height: 2rem;
            border: 1px solid #999;
            border-radius: 0.2rem;
            margin-top: 0.2rem;
            outline: none;
            font-size: 11pt;
            padding-right: .5rem;
            color: #333;
        }

        .boxM .inpts:hover,.boxM .inpts2:hover {
            border-color: #555;
        }

        .boxM .inpts:focus {
            box-shadow: 0 0 6px #00f;
            border-color: #00f;
        }

        .boxM label {
            font-size: 10pt;
            color: #999;
            margin-top: 0.7rem;
            margin-right: -0.5rem;
        }

        .boxM input#btnMenu {
            width: 8rem;
            height: 2.6rem;
            margin: 0.9rem auto;
            cursor: pointer;
            font-size: 12pt;
            box-shadow: 1px 3px 5px #999;
        }

        #alarm {
            margin: 2rem auto;
            width: fit-content;
            color: green;
        }
    #tableBooks table, th, td {
        border: 1px solid #000;
        border-collapse: collapse;
        padding: 1.4rem;
        text-align: center;
        direction: rtl;
    }
   #tableBooks table {
       /* width: 40rem;*/
        border-radius: 10px;
        display: block;
        padding: 0.9rem!important;
    }
    #tableBooks table tbody td{
      padding:0.5rem!important;
    }
    #tableBooks table tbody td input{
      width:6rem;
    }
   #tableBooks th {
        border: 2px solid #000;
    }
   #tableBooks .btns{
        width: 90%;
        height: 2.2rem;
        font-size: inherit;
        font-weight: 900;
        display: flex;
        justify-content: center;
        align-content: center;
        align-items: center;
        margin: auto;
        cursor: pointer;
        border: 2px solid;
        border-radius: .4rem;
        box-shadow: 1px 3px 5px;
    }
   #tableBooks  .btns:hover{
        box-shadow: 0 0 0;
    }
   #tableBooks .edit{
        color: blue;
    }
   #tableBooks .delete{
        color: red;
    }
   #tableBooks .tdBtns{
        padding: 0!important;
    }
    </style>
</head>
<body >
  

  <div class="boxP">
    <section>
    <aside class="left">
        <div class="boxdd">
            <div class="des1 c01 ">
                <div class="boxs boxM">
                    <h1>
                        ورود اطلاعات کتابها
                    </h1>
                    <section class="form">
                        <label for="productB">
                          <span class="w0">
                            نام محصول
                          </span>
                        </label>
                        <input type="text" id="productB" class="inpts2">
                        <label for="codeProductB">
                          <span class="w0">
                            کد محصول
                          </span>
                        </label>
                        <input type="text" id="codeProductB" class="inpts">
                        <label for="codeDflipProductB">
                          <span class="w0">
                            کد
                          <span>
                            <span class="we0">
                              dflip
                            </span>       
                          <span class="w0">
                             محصول
                          <span>
                        </label>
                        <input type="text" id="codeDflipProductB" class="inpts">
                        <label for="codeDflipPBPrw">
                          <span class="w0">
                            کد
                          <span>
                            <span class="we0">
                              dflip
                            </span>       
                          <span class="w0">
                            پیش نمایش محصول
                          <span>   
                        </label>
                        <input type="text" id="codeDflipPBPrw" class="inpts">
                        <input type="button" id="btnMenu" class="btn" value="ذخیره">
                    </section>
                  <h2 id="alarm"></h2>
                </div>
            </div>
            <div class="des2 c01 hide">
              <h1>نمایش اطلاعات</h1>
              <div id="tableBooks">
                  <table>
                      <thead>
                        <th>شناسه</th>
                        <th>تاریخ</th>
                        <th>نام</th>
                        <th>
                          <span class="w0">
                            کد
                          <span>
                            <span class="we0">
                              dflip
                            </span>       
                          <span class="w0">
                            پیش نمایش
                          <span>
                       </th>
                        <th>
                          <span class="w0">
                            کد
                          <span>
                            <span class="we0">
                              dflip
                            </span>       
                          <span class="w0">
                            نمایش
                          <span>
                         </th>
                        <th>ویرایش</th>
                        <th>حذف</th>
                      </thead>
                      <tbody>
                        <tr>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td class="tdBtns">
                                <input type="button" value="ویرایش" class="btns edit"  >
                            </td>
                            <td class="tdBtns">
                                <input type="button" value="حذف" class="btns delete">
                            </td>
                        </tr>
                      </tbody>
                  </table>
              </div>
          	</div>

        </div>
    </aside>
    <aside class="right">
        <div class="menu_plugin">
            <ul>
                <li name="d1">ورود اطلاعات</li>
                <li name="d2" id="btnDBooks">نمایش اطلاعات</li>

            </ul>
        </div>
    </aside>
</section>
  </div>

  
</body>
</html>