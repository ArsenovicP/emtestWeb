<!doctype html>


<html>

    <head>
        <title>Pohovor</title>
    </head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <body>
    <div class="container">

        <h1 class="text-info">Pohovor</h1>

        <div class="row">

            <div class="col-sm-3">
                <input type="number" id="count" name="count" class="form-control">
            </div>
            <div class="col-sm-2">
                <button class="btn btn-success" id="button">Generovať</button>
            </div>

        </div>
        <div class="row">
            <div id="result">
            </div>
        </div>

    </div>
        <script>
            $(document).ready(function(){
                $("button").click(function(){


                    $.post("script.php", {count: $('#count').val()} , function(data){

                        $("#result").html(data);
                    });
                });
            });
        </script>
    </body>

</html>