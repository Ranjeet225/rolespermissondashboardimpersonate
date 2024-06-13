<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <style>
    #oopss {
      background: linear-gradient(-45deg, #fff300, #efe400);
      position: fixed;
      left: 0px;
      top: 0;
      width: 100%;
      height: 100%;
      line-height: 1.5em;
      z-index: 9999;
    }
    #oopss #error-text {
      font-size: 40px;
      display: flex;
      flex-direction: column;
      align-items: center;
      font-family: 'Shabnam', Tahoma, sans-serif;
      color: #000;
      direction: rtl;
    }
    #oopss #error-text img {
      margin: 85px auto 20px;
      height: 342px;
    }
    #oopss #error-text span {
      position: relative;
      font-size: 3.3em;
      font-weight: 900;
      margin-bottom: 50px;
    }
    #oopss #error-text p.p-a {
      font-size: 19px;
      margin: 30px 0 15px 0;
    }
    #oopss #error-text p.p-b {
      font-size: 15px;
    }
    #oopss #error-text .back {
      background: #fff;
      color: #000;
      font-size: 30px;
      text-decoration: none;
      margin: 2em auto 0;
      padding: .7em 2em;
      border-radius: 500px;
      box-shadow: 0 20px 70px 4px rgba(0, 0, 0, 0.1), inset 7px 33px 0 0px #fff300;
      font-weight: 900;
      transition: all 300ms ease;
    }
    #oopss #error-text .back:hover {
      -webkit-transform: translateY(-13px);
              transform: translateY(-13px);
      box-shadow: 0 35px 90px 4px rgba(0, 0, 0, 0.3), inset 0px 0 0 3px #000;
    }
    @font-face {
      font-family: Shabnam;
      src: url("https://cdn.rawgit.com/ahmedhosna95/upload/ba6564f8/fonts/Shabnam/Shabnam-Bold.eot");
      src: url("https://cdn.rawgit.com/ahmedhosna95/upload/ba6564f8/fonts/Shabnam/Shabnam-Bold.eot?#iefix") format("embedded-opentype"), url("https://cdn.rawgit.com/ahmedhosna95/upload/ba6564f8/fonts/Shabnam/Shabnam-Bold.woff") format("woff"), url("https://cdn.rawgit.com/ahmedhosna95/upload/ba6564f8/fonts/Shabnam/Shabnam-Bold.woff2") format("woff2"), url("https://cdn.rawgit.com/ahmedhosna95/upload/ba6564f8/fonts/Shabnam/Shabnam-Bold.ttf") format("truetype");
      font-weight: bold;
    }
    @font-face {
      font-family: Shabnam;
      src: url("https://cdn.rawgit.com/ahmedhosna95/upload/ba6564f8/fonts/Shabnam/Shabnam.eot");
      src: url("https://cdn.rawgit.com/ahmedhosna95/upload/ba6564f8/fonts/Shabnam/Shabnam.eot?#iefix") format("embedded-opentype"), url("https://cdn.rawgit.com/ahmedhosna95/upload/ba6564f8/fonts/Shabnam/Shabnam.woff") format("woff"), url("https://cdn.rawgit.com/ahmedhosna95/upload/ba6564f8/fonts/Shabnam/Shabnam.woff2") format("woff2"), url("https://cdn.rawgit.com/ahmedhosna95/upload/ba6564f8/fonts/Shabnam/Shabnam.ttf") format("truetype");
      font-weight: normal;
    }
    </style>
  <body>
    <div id='oopss'>
        <div id='error-text'>
            <img src="https://cdn.rawgit.com/ahmedhosna95/upload/1731955f/sad404.svg" alt="404">
            <span>404 PAGE</span>
            <p class="p-a">
               . The page you were looking for could not be found</p>
            <a href='{{url()->previous()}}' class=" btn btn-primary" >... Back to previous page</a>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
