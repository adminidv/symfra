<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Customize Option Popup</title>
    <link rel="stylesheet" type="text/css" href="icon_font/css/icon_font.css"/>
    <link rel="stylesheet" type="text/css" href="css/jquery.transfer.css"/>






    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/symfra_popups.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.css" type="text/css">
    <script src="js/jquery-1.12.4.js"></script>


</head>
<body>

              <button type="button"  data-toggle="modal" data-target="#popup_1">Customize</button>

              <!-- Modal_one-->
              <div class="modal fade symfra_popup1" id="popup_1" role="dialog">
                    <div class="modal-dialog customizeoption_modal_dialog">
                    
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Customize Table</h4>
                        </div>
                        <div class="modal-body">
                          
                          <div class="transfer"></div>

                        </div>
                        <div class="modal-footer">
                            <p>Add Related content if needed</p>
                        </div>
                      </div>
                      
                    </div>
              </div>

    



<script src="js/bootstrap.min.js"></script>

</body> 
<script type="text/javascript" src="js/jquery.transfer.js"></script>

<script type="text/javascript">

    var languages = [
        {
            "language": "jQuery",
            "value": 122
        },
        {
            "language": "AngularJS",
            "value": 132
        },
        {
            "language": "ReactJS",
            "value": 422
        },
        {
            "language": "VueJS",
            "value": 232
        },
        {
            "language": "JavaScript",
            "value": 765
        },
        {
            "language": "Java",
            "value": 876
        },
        {
            "language": "Python",
            "value": 453
        },
        {
            "language": "TypeScript",
            "value": 125
        },
        {
            "language": "PHP",
            "value": 633
        },
        {
            "language": "Ruby on Rails",
            "value": 832
        }
    ];

    var groupData = [
        {
            "groupName": "JavaScript",
            "groupData": [
                {
                    "language": "jQuery",
                    "value": 122
                },
                {
                    "language": "AngularJS",
                    "value": 643
                },
                {
                    "language": "ReactJS",
                    "value": 422
                },
                {
                    "language": "VueJS",
                    "value": 622
                }
            ]
        },
        {
            "groupName": "Popular",
            "groupData": [
                {
                    "language": "JavaScript",
                    "value": 132
                },
                {
                    "language": "Java",
                    "value": 112
                },
                {
                    "language": "Python",
                    "value": 124
                },
                {
                    "language": "TypeScript",
                    "value": 121
                },
                {
                    "language": "PHP",
                    "value": 432
                },
                {
                    "language": "Ruby on Rails",
                    "value": 421
                }
            ]
        }
    ];

    var settings = {
        "inputId": "languageInput",
        "data": languages,
        "groupData": groupData,
        "itemName": "language",
        "groupItemName": "groupName",
        "groupListName" : "groupData",
        "container": "transfer",
        "valueName": "value",
        "callable" : function (data, names) {
            console.log("Selected ID：" + data)
            $("#selectedItemSpan").text(names)
        }
    };

    Transfer.transfer(settings);
</script>
</html>
