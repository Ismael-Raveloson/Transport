<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/index.css">
    <title>Document</title>
</head>
<body>
    <div class="place">
        <div class="devant">
            <span class="sofera">Sofera</span>
            <span></span>
            <span class="occuper" data-value="1">1</span>
            <span class="occuper" data-value="2">2</span>
        </div>
        <div class="arriere">
            <span class="passager" data-value="3">3</span>
            <span class="passager" data-value="4">4</span>
            <span></span>
            <span class="passager" data-value="5">5</span>
        </div>
        <div class="arriere">
            <span class="occuper" data-value="6">6</span>
            <span class="passager" data-value="7">7</span>
            <span></span>
            <span class="passager" data-value="8">8</span>
        </div>
        <div class="arriere">
            <span class="passager" data-value="9">9</span>
            <span class="passager" data-value="10">10</span>
            <span></span>
            <span class="passager" data-value="11">11</span>
        </div>
        <div class="arriere">
            <span class="passager" data-value="12">12</span>
            <span class="passager" data-value="13">13</span>
            <span class="passager" data-value="14">14</span>
            <span class="passager" data-value="15">15</span>
        </div>
        <button type="submit" id="sender">Valider</button>
        <a href="<?php echo base_url()?>Welcome/link">Lien </a>
    </div>

    <script>
        function reste(haut, bas) {
            var q = Math.floor(haut / bas);
            var r = haut - bas * q;
            return r;
        }

        function parite(click) {
        var r = reste(click, 2);
        return r === 0;
        }

        var spans = document.getElementsByClassName("passager");
        var tableau = new Array();
        var envoyer = document.getElementById("sender");

        Array.from(spans).forEach(function(span) {
            span.addEventListener("click", function() {
            var clickCount = parseInt(this.dataset.clicks) || 0;
            clickCount++;

                if (parite(clickCount)==false) {
                    this.style.backgroundColor = "green";
                    this.style.color = "white";
                    tableau.push(this.getAttribute("data-value"));
                } else {
                    this.style.backgroundColor = "inherit";
                    this.style.color = "black";
                    var itemToRemove = tableau.indexOf(this.getAttribute("data-value"));
                    if (itemToRemove > -1) {
                        tableau.splice(itemToRemove, 1);
                    }
                }
                
                envoyer.addEventListener("click",function(){
                    console.log(tableau);
                
                });
                
                this.dataset.clicks = clickCount;
            });
        });

    var places =  document.getElementsByClassName("occuper");
    Array.from(places).forEach(function(place){
        place.addEventListener("click",function(){
            alert("La place " + this.getAttribute("data-value") + " est occupée");
        });
    });

    </script>

</body>
</html>