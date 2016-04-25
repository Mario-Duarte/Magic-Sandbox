<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>127.0.0.1</title>

    <style>
        html, body {
            margin: 0;
            padding: 0;
            font-family: helvetica, arial, sans-serif;
            background-color: #f9f9f9;
        }

        .header {
            width: 100%;
            height: auto;
            position: relative;
        }

        .header .inner {
            width: 100%;
            max-width: 960px;
            height: auto;
            text-align: center;
            margin: 50px auto;
            position: relative;
        }

        .list {
            width: 100%;
            height: auto;
            margin: 25px 0;
        }

        #list {
            width: 100%;
            max-width: 960px;
            height: auto;
            margin: 0 auto;
            padding: 0;
        }

        #list li {
            background-color: #EEEEEE;
            list-style: none;
            float: left;
            width: 21%;
            margin: 10px 1%;
            padding: 20px 1%;
            min-height: 200px;
            text-align: center;
        }

        #list a li {
            text-decoration: none;
            font-weight: bold;
        }

        .single a {
            text-decoration: none;
            font-weight: bold;
        }

        .info {
            text-decoration: none;
            color: #34495e;
            font-weight: lighter !important;
        }

        .info a {
            text-decoration: none !important;
            color: #3498db !important;
            font-weight: lighter;
        }

        .search-wrapper {
            width: 100%;
            text-align: left;
            background-color: #333333;
        }

        .search-wrapper .inner {
            max-width: 960px;
            width: 100%;
            margin: 0 auto;
        }

        #search {
            width: 25%;
            border: none;
            background-color: #FFFFFF;
            border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            padding: 5px 10px;
            font-size: 14px;
            text-transform: uppercase;
            margin: 10px;

        }

        #search:focus {outline:0 !important;}

        @media all and (max-width: 768px) {

            #list li {
                width: 29.33%;
            }

        }

        @media all and (max-width: 425px) {

            #list li {
                width: 46%;
            }

            #search {
                width: 60%;
            }

            .search-wrapper {
                text-align: center;
            }

        }

        @media all and (max-width: 320px) {

            #list li {
                width: 100%;
                margin: 5px 0;
            }

            .search-wrapper {
                text-align: center;
            }

            #search {
                width: 80%;
            }

        }

    </style>

</head>
<body>

<div class="header">
    <div class="inner">
        <h1>Little Magic Sandbox</h1>
        <p>There is no place like 127.0.0.1</p>
    </div>
</div>

<div class="search-wrapper">
    <div class="inner">
        <input id="search" type="text" name="search" placeholder="Search Projects..." onchange="searchProjects()" />
    </div>
</div>

<div class="list">
    <ul id="list"></ul>
</div>

<script>
    var img = 'data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTYuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjY0cHgiIGhlaWdodD0iNjRweCIgdmlld0JveD0iMCAwIDQ0Ny42NzcgNDQ3LjY3NyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDQ3LjY3NyA0NDcuNjc3OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxnPgoJPHBhdGggZD0iTTM5LjA5OCwyOTcuMDMxaDEwMC4xOTV2MjkuODc4SDM5LjA5OFYyOTcuMDMxeiBNMTMwLjUwNyw4NC4zMzVjNS4zMjcsMCw5LjY3NC00LjMzNyw5LjY3NC05LjY3MiAgIHMtNC4zNDItOS42NjYtOS42NzQtOS42NjZjLTUuMzM0LDAtOS42NjYsNC4zMzEtOS42NjYsOS42NjZTMTI1LjE3Nyw4NC4zMzUsMTMwLjUwNyw4NC4zMzV6IE0xOTMuMjM1LDg0LjMzNSAgIGM1LjMzMSwwLDkuNjY3LTQuMzM3LDkuNjY3LTkuNjcycy00LjMzLTkuNjY2LTkuNjY3LTkuNjY2Yy01LjMzNSwwLTkuNjY2LDQuMzMxLTkuNjY2LDkuNjY2UzE4Ny45MDcsODQuMzM1LDE5My4yMzUsODQuMzM1eiAgICBNMzkuMDk4LDI0OC4zNTloMTAwLjE5NXYtMjkuODg2SDM5LjA5OFYyNDguMzU5eiBNMjUxLjM1MSwxOTMuMDYxSDEzOS4yOTJ2OS41OTNIMjMuMjg3djYxLjUxOWgxMTYuMDA1djE3LjAzOUgyMy4yODd2NjEuNTE3ICAgaDExNi4wMDV2MzMuNTIzSDBWMjMuMzk0aDI1MS4zNTFWMTkzLjA2MXogTTE2Ny43NDgsNzQuNjY5YzAsMTQuMDYsMTEuNDMzLDI1LjQ4OSwyNS40ODcsMjUuNDg5ICAgYzE0LjA1MywwLDI1LjQ4OC0xMS40MjksMjUuNDg4LTI1LjQ4OWMwLTE0LjA1My0xMS40MzUtMjUuNDgzLTI1LjQ4OC0yNS40ODNDMTc5LjE4MSw0OS4xODYsMTY3Ljc0OCw2MC42MTcsMTY3Ljc0OCw3NC42Njl6ICAgIE0xMDUuMDI4LDc0LjY2OWMwLDE0LjA2LDExLjQyNSwyNS40ODksMjUuNDc5LDI1LjQ4OWMxNC4wNjMsMCwyNS40ODktMTEuNDI5LDI1LjQ4OS0yNS40ODljMC0xNC4wNTMtMTEuNDI2LTI1LjQ4My0yNS40ODktMjUuNDgzICAgQzExNi40NTMsNDkuMTg2LDEwNS4wMjgsNjAuNjE3LDEwNS4wMjgsNzQuNjY5eiBNMjMwLjY5OSwxMjMuMDA5SDIzLjI4N3Y2MS41MTloMjA3LjQxMlYxMjMuMDA5eiBNMjE0Ljg4MSwxNjguNzExSDM5LjA5OHYtMjkuODgyICAgaDE3NS43ODNWMTY4LjcxMXogTTIwMi45MDIsMTQ4LjVoLTI0LjA1NXY4LjM0MmgyNC4wNTVWMTQ4LjV6IE0zMzcuNDE1LDM5My4xMTd2MTMuMzcxYzM2Ljg5MiwxLjIxNSw2My41MTksNC42MTgsNjMuNTE5LDguNjU3ICAgYzAsNS4wNDQtNDEuNjYyLDkuMTM4LTkzLjA0Niw5LjEzOGMtNTEuMzk0LDAtOTMuMDQtNC4wOC05My4wNC05LjEzOGMwLTMuNjIzLDIxLjQ4Mi02LjczNiw1Mi41ODUtOC4yMTh2LTEzLjgxMUgxNTcuMTU2VjIwNy41NjUgICBoMjkwLjUyMXYxODUuNTUySDMzNy40MTV6IE00MjguNTg5LDM3Ny4yMTNWMjIxLjg3OUgxNzYuMjI5djE1NS4zMzNINDI4LjU4OXoiIGZpbGw9IiMwMDAwMDAiLz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K';
    var list = new Array();

    var colors = ['#1abc9c','#2ecc71','#16a085','#27ae60'];
    var colorLenght = colors.length - 1;

    function getRandomColor() {
        var randomColor = Math.floor(Math.random() * (colorLenght - 0 + 1)) + 0;
        return randomColor
    }

    <?php $folders = glob("*"); foreach ($folders as $folder){ if(is_dir($folder)){ $extraInfo = file_get_contents( $folder.'/info.txt', true );?>
    list.push(['<?php echo $folder ?>','<?php echo $extraInfo; ?>']);
    <?php }}?>

    var listWrapper = document.getElementById('list');
    var arrayLength = list.length;

    for (var i = 0; i < arrayLength; i++) {
        listWrapper.innerHTML += "<li class='single'><a href='" + list[i][0] + "' style='color:" + colors[getRandomColor()] + " !important;'><img src='" + img + "' width='52' height='52'><br/>" + list[i][0] + "</a><p class='info'>" + list[i][1] + "</p></li>";
    }

    function searchProjects() {

        var query = document.getElementById('search').value;
        var listWrapper = document.getElementById('list');
        var arrayLength = list.length;
        listWrapper.innerHTML = '';

        for (var i = 0; i < arrayLength; i++) {
            if ( query != '' ) {
                if ( list[i][0] == query || list[i][0].indexOf(query) > -1 ) {
                    listWrapper.innerHTML = "<li class='single'><a href='" + list[i][0] + "' style='color:" + colors[getRandomColor()] + " !important;'><img src='" + img + "' width='52' height='52'><br/>" + list[i][0] + "</a><p class='info'>" + list[i][1] + "</p></li>";
                }
            } else {
                listWrapper.innerHTML += "<li class='single'><a href='" + list[i][0] + "' style='color:" + colors[getRandomColor()] + " !important;'><img src='" + img + "' width='52' height='52'><br/>" + list[i][0] + "</a><p class='info'>" + list[i][1] + "</p></li>";
            }
        }

    }
</script>

</body>
</html>
