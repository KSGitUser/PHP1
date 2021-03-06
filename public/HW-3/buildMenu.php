


<?php
$textOfSite = '<!DOCTYPE html>

<html>
    <head>
        <title>Menu from php</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
              integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>

    <style> 
        .is-submenu:hover ~ ul{
            display: block;
        }

        .submenu {
            display:none;
            margin-left: 40px;
        }

        .submenu:hover {
            display: block;
        }


    </style>
    <body>
     {{MENU}}
    </body>
</html>';



$elemOfMenu = [
    "class" => "nav flex-column",
    "li" => [
        [
            "class" => "nav-item",
            "a" => ["class" => "nav-link active",
                "href" => "#",
                "text" => "Active"]
        ]
        ,
        [
            "class" => "nav-item",
            "a" => ["class" => "nav-link is-submenu",
                "href" => "#",
                "text" => "link1 with submenu"],
            "submenu" =>
            ["class" => "nav flex-column submenu",
                "li" =>
                [
                    [
                        "class" => "nav-item",
                        "a" => ["class" => "nav-link",
                            "href" => "#",
                            "text" => "Submenu Link1"]
                    ],
                    [
                        "class" => "nav-item",
                        "a" => ["class" => "nav-link",
                            "href" => "#",
                            "text" => "Submenu link2"]
                    ]
                ]
            ]
        ],
        [
            "class" => "nav-item",
            "a" => ["class" => "nav-link",
                "href" => "#",
                "text" => "link2"]
        ]
    ]
];

$ulTemplate = "<ul {{CLASS}}>{{LI}}</ul>";
$liTemplate = "<li {{LI-CLASS}}><a {{A-CLASS}} {{A-HREF}}>{{A-TEXT}}</a> {{SUBMENU}} </li>";

function buildMenuLi($valueLi, $liTemplate, $ulTemplate) {

    $menuOfLi = '';
    foreach ($valueLi as $value) {
        $htmlLiMenu = $liTemplate;
        foreach ($value as $keyOfValue => $valueOfValue) {

            if ($keyOfValue === "class") {
                $subject = $keyOfValue . "=" . '"' . $valueOfValue . '"';
                $htmlLiMenu = str_replace("{{LI-CLASS}}", $subject, $htmlLiMenu);
            }

            if ($keyOfValue === "a") {
                foreach ($valueOfValue as $kOfV => $vOfV) {

                    if ($kOfV === "class") {
                        $subject = $kOfV . "=" . '"' . $vOfV . '" ';
                        $htmlLiMenu = str_replace("{{A-CLASS}}", $subject, $htmlLiMenu);
                    }
                    if ($kOfV === "href") {
                        $subject = $kOfV . "=" . '"' . $vOfV . '" ';
                        $htmlLiMenu = str_replace("{{A-HREF}}", $subject, $htmlLiMenu);
                    }
                    if ($kOfV === "text") {
                        $subject = $vOfV;
                        $htmlLiMenu = str_replace("{{A-TEXT}}", $subject, $htmlLiMenu);
                    }
                }
            }
            if ($keyOfValue === "submenu") {
                $subMenu = buildMenu($valueOfValue, $ulTemplate, $liTemplate);
                $htmlLiMenu = str_replace("{{SUBMENU}}", $subMenu, $htmlLiMenu);
            }
        }

        $htmlLiMenu = str_replace("{{SUBMENU}}", '', $htmlLiMenu);
        $menuOfLi .= $htmlLiMenu;
    }
    return $menuOfLi;
}

function buildMenu($elemOfMenu, $ulTemplate, $liTemplate) {
    $htmlMenu = $ulTemplate;
    $liOFMenu = '';
    foreach ($elemOfMenu as $key => $value) {

        if ($key === "class") {
            $subject = $key . '="' . $value . '"';
            $htmlMenu = str_replace("{{CLASS}}", $subject, $htmlMenu);
        }
        if ($key === "li") {
            $liOFMenu .= buildMenuLi($value, $liTemplate, $ulTemplate);
        }
    }
    $htmlMenu = str_replace("{{LI}}", $liOFMenu, $htmlMenu);
    
    return $htmlMenu;
}

$menu = buildMenu($elemOfMenu, $ulTemplate, $liTemplate);
$textOfSite = str_replace("{{MENU}}", $menu, $textOfSite);
echo $textOfSite;
?>


