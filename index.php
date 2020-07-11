<!doctype html>


<html>

    <head>
        <title>Pohovor</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

    </head>

    <body>
    <div class="container">

        <h1 class="text-info">Pohovor</h1>

        <div class="row">

            <div class="col-sm-3">
                <input type="number" id="count" name="count" class="form-control">
                <div class="invalid-feedback">
                    Počet musí byť od 100 do 500
                </div>
            </div>
            <div class="col-sm-2">
                <button class="btn btn-success" id="button">Generovať</button>
            </div>

        </div>
        <div class="row mt-5">
            <div class="col-sm-12">
            <div id="result">
                <table class="table table-striped" id="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nazov</th>
                            <th>Rychlost</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            </div>
        </div>
        <div class="row" id="stats">
        </div>

    </div>
        <script>
            $(document).ready(function(){

                $("button").hide();
                $(".invalid-feedback").hide();

                $("#count").change(function () {
                    if ($("#count").val()<100 | $("#count").val()>500){
                        $("button").hide();
                        $("#count").addClass("is-invalid");
                        $("#count").removeClass("is-valid");
                        $(".invalid-feedback").show();
                    }
                    else {
                        $("button").show();
                        $("#count").addClass("is-valid");
                        $("#count").removeClass("is-invalid");
                        $(".invalid-feedback").hide();
                    }
                    
                })


                $(document).ready( function () {
                    $('#table').DataTable({
                        "paging":   false,
                        "ordering": false,
                        "info":     false
                    });

                } );


                $("button").click(function(){


                    var pocet50 = 0,
                        pocet80 = 0,
                        pocetnad80 = 0;

                    $.post("script.php", {count: $('#count').val()} , function(data){

                        var parsedJson=$.parseJSON(data);


                        for (myObj in parsedJson)
                        {
                                var temp = '<tr';
                                if (myObj[rychlost] < 50){
                                    temp += ' style="background-color: #7dd162;"';
                                    pocet50++;
                                }
                                else if (myObj[rychlost] >= 50 & myObj[rychlost] < 80){

                                    temp += ' style="background-color: #ffbf51;"';
                                    pocet80++;
                                }
                                else {

                                    temp += ' style="background-color: #ff5b5b;"';
                                    pocetnad80++;

                                }

                                temp += '><td>' + myObj[ID] + '</td>';
                                temp += '<td>' + myObj[nazov] + '</td>';
                                temp += '<td>' + myObj[rychlost] + '</td></tr>';
                                $("table tbody").append(temp);

                        };



                    });

                });
            });
        </script>
    </body>

</html>
