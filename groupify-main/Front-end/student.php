<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="Assets/bulma.css" rel="stylesheet">
<!--    https://wikiki.github.io/form/slider/ -->
    <link href="Assets/Slider/bulma-slider.min.css" rel="stylesheet">
<!--    Font Awesome -->
    <script defer src="Assets/Font-Awesome-All.js"></script>
    <title>Students' page</title>
</head>
<body>
    <div class="container is-max-widescreen mt-4">
        <div class="columns has-background-primary-light">
            <div class="column">
<!--                Classes dropdown menu -->
                <div class="dropdown block">
                    <div class="dropdown-trigger">
                        <button class="button" aria-haspopup="true" aria-controls="dropdown-menu3">
                            <span>Class 1</span>
                            <span class="icon is-small">
                                <i class="fas fa-angle-down" aria-hidden="true"></i>
                            </span>
                        </button>
                    </div>
    <!--                Probably a PHP / MySQL loop here to provide some classes?-->
                    <div class="dropdown-menu" id="dropdown-menu3" role="menu">
                        <div class="dropdown-content">
                            <a href="#" class="dropdown-item">
                                Class 1
                            </a>
                            <a href="#" class="dropdown-item">
                                Class 2
                            </a>
                            <a href="#" class="dropdown-item">
                                Class 3
                            </a>
                            <a href="#" class="dropdown-item">
                                Class 4
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                Class 5
                            </a>
                        </div>
                    </div>
                </div>
<!--                Sliders-->
<!--                Remember to change the input ID and output "for" for each individual slider-->
                <div class="content has-text-centered">
                    <h4>Hyped?</h4>
                    <label class="block">
                        <input id="sliderWithValue" class="slider is-fullwidth is-medium is-circle is-info" min="0" max="100" value="50" step="1" type="range">
                        <output class="button is-static is-info" for="sliderWithValue">50</output>
                    </label>
                </div>
                <div class="content has-text-centered">
                    <h4>Sick?</h4>
                    <label class="block">
                        <input id="sliderWithValue1" class="slider is-fullwidth is-medium is-circle is-info" min="0" max="100" value="50" step="1" type="range">
                        <output class="button is-static is-info" for="sliderWithValue1">50</output>
                    </label>
                </div>
                <div class="content has-text-centered">
                    <h4>Trivago</h4>
                    <label class="block">
                        <input id="sliderWithValue2" class="slider is-fullwidth is-medium is-circle is-info" min="0" max="100" value="50" step="1" type="range">
                        <output class="button is-static is-info" for="sliderWithValue2">50</output>
                    </label>
                </div>
<!--                "Footer" buttons -->
                <div class="block has-text-right">
                    <button id="submit-button" class="button is-success">
                        <span class="icon is-small">
                          <em class="fas fa-check"></em>
                        </span>
                        <span>Submit</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="Assets/modal.js"></script>
<script src="Assets/dropdown.js"></script>
<script src="Assets/Slider/bulma-slider.min.js"></script>
<!--Manages the slider output values -->
<script>bulmaSlider.attach();</script>