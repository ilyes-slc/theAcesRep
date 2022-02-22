<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* baseFront.html.twig */
class __TwigTemplate_16aa60ce418b479fdc25c27560716b9633d350acccc5717076ac9a4d6be8bd0f extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'css' => [$this, 'block_css'],
            'header' => [$this, 'block_header'],
            'content' => [$this, 'block_content'],
            'footer' => [$this, 'block_footer'],
            'cart' => [$this, 'block_cart'],
            'js' => [$this, 'block_js'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "baseFront.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "baseFront.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    ";
        // line 8
        $this->displayBlock('css', $context, $blocks);
        // line 86
        echo "</head>
<body>
    ";
        // line 88
        $this->displayBlock('header', $context, $blocks);
        // line 124
        echo "    
<!-- ==================Main Section------============================== -->
    ";
        // line 126
        $this->displayBlock('content', $context, $blocks);
        // line 533
        echo "
<div class=\"footer\">
    ";
        // line 535
        $this->displayBlock('footer', $context, $blocks);
        // line 586
        echo "</div>
";
        // line 587
        $this->displayBlock('cart', $context, $blocks);
        // line 629
        echo "
    
</div>

    ";
        // line 633
        $this->displayBlock('js', $context, $blocks);
        // line 640
        echo "</body>
</html>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 7
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Gaming Gear Website";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 8
    public function block_css($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "css"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "css"));

        // line 9
        echo "    <style>
        .dropbtn {
          background-color: #4CAF50;
          color: white;
          padding: 16px;
          font-size: 16px;
          border: none;
          cursor: pointer;
        }
        
        .dropdown {
          position: relative;
          display: inline-block;
        }
        
        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f9f9f9;
          min-width: 160px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }
        
        .dropdown-content a {
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
        }
        
        .dropdown-content a:hover {background-color: #f1f1f1}
        
        .dropdown:hover .dropdown-content {
          display: block;
        }
        
        .dropdown:hover .dropbtn {
          background-color: #3e8e41;
        }
        </style>
        
    <style>
        fieldset {
            background-color : white;
        }
    </style>
    <style>
        #customers {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        #customers td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;
        }
        
        #customers tr:nth-child(even){background-color: #f2f2f2;}
        #customers tr:nth-child(odd){background-color: #f2f2f2;}
        
        #customers tr:hover {background-color: #ddd;}
        
        #customers th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #04AA6D;
          color: white;
        }
        </style>
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"";
        // line 82
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/main.css"), "html", null, true);
        echo " \">
    <link rel=\"stylesheet\" href=\"";
        // line 83
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("https://unicons.iconscout.com/release/v4.0.0/css/line.css"), "html", null, true);
        echo " \">
    <link rel=\"stylesheet\" href=\"";
        // line 84
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/swiper-bundle.min.css"), "html", null, true);
        echo "\">
    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 88
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "header"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "header"));

        // line 89
        echo "    <!-- ========================= Header Section -->
    <header class=\"header \" id=\"header\">
        <div class=\"logoDiv\">
           <a href=\"test\"> <i class=\"uil uil-pagerduty icon logoIcon\"></i></a>
        </div>
        <div class=\"navBar\" id=\"navBar\">
            <ul class=\"navLists\">
                <li class=\"navItem\"><a href=\"test\" class=\"navLink\">Home</a></li>
            </ul>
           <div class=\"closeIconDiv\" id=\"closeIcon\">
            <i class=\"uil uil-times-circle icon closeIcon\"></i>
           </div>
        </div>
        <div class=\"toggleIconDiv\" id=\"toggleIcon\">
            <i class=\"uil uil-ellipsis-h icon\"></i>
        </div>
        <div class=\"accCart\">
            <div class=\"accDiv dropdown\">
                <i class=\"uil uil-user-circle icon  userIcon dropbtn\"></i>
                <div class=\"dropdown-content\">
                    <a href=\"afficher\">My Complaints</a>
                </div>
                <div class=\"plainName\">TheAces</div>
             
            </div>
            <div class=\"cartDiv\" id=\"cartIcon\">
                <i class=\"uil uil-shopping-bag icon\" ></i>
            </div>

            <div class=\"themeIconDiv\" id=\"themeIconDiv\">
                <i class=\"uil uil-sun icon\"></i>
            </div>
        </div>
    </header>
    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 126
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 127
        echo "    <div class=\"main\" id=\"home\">

        <div class=\"bannerOne swiper\">
            <div class=\"swiper-wrapper \">
                <div class=\"bannerContent grid swiper-slide\">
                    <h1 class=\"overlayText\">Mouse</h1>
                    <div class=\"mainTextDiv\">
                        <div>
                            <h1 class=\"mainTitle\">Mouse - <br> Steelseries <br>Sensei 310</h1>
                        </div>

                       <div>
                        <div class=\"price\">
                            <span class=\"previous\">\$999</span>
                            <span class=\"current\">\$470</span>
                        </div>

                        <div class=\"cartButton\">
                            <i class=\"uil uil-plus-circle icon\"></i>
                            <span>Add To Cart</span>
                        </div>
                       </div>
                    </div>
                    <div class=\"bannerImageDiv\">
                        <img src=\"";
        // line 151
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/Images/mouse2.png"), "html", null, true);
        echo "\" alt=\"Mouse image\">
                    </div>
                </div>
                <div class=\"bannerContent grid swiper-slide\">
                    <!-- <h1 class=\"overlayText\">Computer</h1> -->
                    <div class=\"mainTextDiv\">
                        <div>
                            <h1 class=\"mainTitle\">Beats Studio3 <br>Wireless <br> Midnight Black</h1>
                        </div>

                        <div>
                            <div class=\"price\">
                                <span class=\"previous\">\$500</span>
                                <span class=\"current\">\$245</span>
                            </div>
    
                            <div class=\"cartButton\">
                                <i class=\"uil uil-plus-circle icon\"></i>
                                <span>Add To Cart</span>
                            </div>
                        </div>
                    </div>
                    <div class=\"bannerImageDiv\">
                        <img src=\"";
        // line 174
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/Images/beats.png"), "html", null, true);
        echo "\"\" alt=\"Mouse image\">
                    </div>
                </div>
                
            </div>
            <div class=\"swiper-pagination\"></div>
        </div>
    </div>

    <!-- =======================browser Section=========================== -->

    <div class=\"browser section container\" id=\"browser\">
        <div class=\"ItemCard grid browserOne \">
            <div class=\"cardText\">
                <div class=\"cardPrice\">
                    <small>Starting from ...</small>
                    <span class=\"price\">\$ 29</span>
                </div>
                <div class=\"itemNameDiv\">
                    <span class=\"name\">Mice</span>
                    <div class=\"cartButton\">
                        <i class=\"uil uil-minus-circle icon\"></i>
                        <span>Browse</span>
                    </div>
                </div>
            </div>

            <div class=\"itemImage\">
                <img src=\"";
        // line 202
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/Images/mouse.png"), "html", null, true);
        echo "\" alt=\"Mice Image\" >
            </div>
        </div>
        <div class=\"ItemCard grid browserFour \">
            <div class=\"cardText\">
                <div class=\"cardPrice\">
                    <small>Starting from ...</small>
                    <span class=\"price\">\$ 1,400</span>
                </div>
                <div class=\"itemNameDiv\">
                    <span class=\"name\">Curved Monitor</span>
                    <div class=\"cartButton\">
                        <i class=\"uil uil-minus-circle icon\"></i>
                        <span>Browse</span>
                    </div>
                </div>
            </div>

            <div class=\"itemImage\">
                <img src=\"";
        // line 221
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/Images/tv.png"), "html", null, true);
        echo "\" alt=\"Mice Image\" >
            </div>
        </div>
        <div class=\"ItemCard grid browserTwo \">
            <div class=\"cardText\">
                <div class=\"cardPrice\">
                    <small>Starting from ...</small>
                    <span class=\"price\">\$ 546</span>
                </div>
                <div class=\"itemNameDiv\">
                    <span class=\"name\">Turturus v6</span>
                    <div class=\"cartButton\">
                        <i class=\"uil uil-minus-circle icon\"></i>
                        <span>Browse</span>
                    </div>
                </div>
            </div>

            <div class=\"itemImage\">
                <img src=\"";
        // line 240
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/Images/turturus v6.png"), "html", null, true);
        echo "\" alt=\"Mice Image\" >
            </div>
        </div>
        <div class=\"ItemCard grid browserThree \">
            <div class=\"cardText\">
                <div class=\"cardPrice\">
                    <small>Starting from ...</small>
                    <span class=\"price\">\$ 24</span>
                </div>
                <div class=\"itemNameDiv\">
                    <span class=\"name\">Keyboard</span>
                    <div class=\"cartButton\">
                        <i class=\"uil uil-minus-circle icon\"></i>
                        <span>Browse</span>
                    </div>
                </div>
            </div>

            <div class=\"itemImage\">
                <img src=\"";
        // line 259
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/Images/keyboard2.png"), "html", null, true);
        echo "\" alt=\"Mice Image\">
            </div>
        </div>
        
    </div>

    <!-- ===============Featured Items===================================== -->

    <div class=\"featured section container\" id=\"features\">
        <div class=\"sectionTop \">
            <div class=\"introText \">
                <h2 class=\"sectionTitle\">
                    Featured Gears
                </h2>
                <p> Here are some of the features items to enhace you gaming experience. You deserve  great gear for unforgattable experience!  </p>
            </div>
            <div class=\"cartButton\" >
                <i class=\"uil uil-minus-circle icon\"></i>
                <span>Browse</span>
            </div>
        </div>

       <div class=\"sectionBody swiper\">
        <div class=\"swiper-wrapper\">
            <div class=\"sectionItem swiper-slide\">
                <div class=\"itemImageDiv\">
                    <img src=\"";
        // line 285
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/Images/earpod.png"), "html", null, true);
        echo "\" alt=\"Image\">
                </div>
                <div class=\"itemDetails\">
                    <span class=\"name\">Earpod</span>
                    <small>Wireless</small>
                    <span class=\"itemPrice\">\$ 69.01</span>
                </div>
                <div class=\"cartButton\" id=\"itemToCart\">
                    <i class=\"uil uil-plus-circle icon\"></i>
                    <span>Add To Cart</span>
                </div>
            </div>
            <div class=\"sectionItem swiper-slide\">
                <div class=\"itemImageDiv\">
                    <img src=\"";
        // line 299
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/Images/computer2.png"), "html", null, true);
        echo "\" alt=\"Image\">
                </div>
                <div class=\"itemDetails\">
                    <span class=\"name\">Laptop</span>
                    <small>Gaming Laptop</small>
                    <span class=\"itemPrice\">\$ 1,228</span>
                </div>
                <div class=\"cartButton\" id=\"itemToCart\">
                    <i class=\"uil uil-plus-circle icon\"></i>
                    <span>Add To Cart</span>
                </div>
            </div>
            <div class=\"sectionItem swiper-slide\">
                <div class=\"itemImageDiv\">
                    <img src=\"";
        // line 313
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/Images/keyboard.png"), "html", null, true);
        echo "\" alt=\"Image\">
                </div>
                <div class=\"itemDetails\">
                    <span class=\"name\">Moucepad</span>
                    <small>Smooth rubber</small>
                    <span class=\"itemPrice\">\$ 19.31</span>
                </div>
                <div class=\"cartButton\" id=\"itemToCart\">
                    <i class=\"uil uil-plus-circle icon\"></i>
                    <span>Add To Cart</span>
                </div>
            </div>
            <div class=\"sectionItem swiper-slide\">
                <div class=\"itemImageDiv\">
                    <img src=\"";
        // line 327
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/Images/gaming chair.png"), "html", null, true);
        echo "\" alt=\"Image\">
                </div>
                <div class=\"itemDetails\">
                    <span class=\"name\">Gaming Chair</span>
                    <small>Extendable</small>
                    <span class=\"itemPrice\">\$ 494.51</span>
                </div>
                <div class=\"cartButton\" id=\"itemToCart\">
                    <i class=\"uil uil-plus-circle icon\"></i>
                    <span>Add To Cart</span>
                </div>
            </div>
        </div>
       </div>
    </div>

<!-- ========================New Gear================================ -->

<div class=\"newGear section container\" id=\"newgear\">
    <div class=\"sectionTop \">
        <div class=\"introText \">
            <h2 class=\"sectionTitle\">
                New Gears Collection
            </h2>
            <p> Here is the selection of the new and upgraded techno gear for your gaming 2022!  </p>
        </div>
        <div class=\"cartButton\">
            <i class=\"uil uil-minus-circle icon\"></i>
            <span id=\"moreBtn\">More</span>
        </div>
    </div>

    <div class=\"sectionBody grid\" style=\"gap: 3rem;\">
        <div class=\"sectionItem\">
            <div class=\"itemImageDiv\">
                <img src=\"";
        // line 362
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/Images/cable.png"), "html", null, true);
        echo "\" alt=\"Image\">
            </div>
            <div class=\"itemDetails\">
                <span class=\"name\">USB Cables</span>
                <small>original Black</small>
                <span class=\"itemPrice\">\$ 19.01</span>
            </div>
            <div class=\"cartButton\" id=\"itemToCart\">
                <i class=\"uil uil-plus-circle icon\"></i>
                <span>Add To Cart</span>
            </div>
        </div>
        <div class=\"sectionItem \">
            <div class=\"itemImageDiv\">
                <img src=\"";
        // line 376
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/Images/mic.png"), "html", null, true);
        echo "\" alt=\"Image\">
            </div>
            <div class=\"itemDetails\">
                <span class=\"name\">Microphone</span>
                <small>Great Sound</small>
                <span class=\"itemPrice\">\$ 428</span>
            </div>
            <div class=\"cartButton\" id=\"itemToCart\">
                <i class=\"uil uil-plus-circle icon\"></i>
                <span>Add To Cart</span>
            </div>
        </div>
        <div class=\"sectionItem \">
            <div class=\"itemImageDiv\">
                <img src=\"";
        // line 390
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/Images/router.png"), "html", null, true);
        echo "\" alt=\"Image\">
            </div>
            <div class=\"itemDetails\">
                <span class=\"name\">WiFi Routers</span>
                <small>Hight band width</small>
                <span class=\"itemPrice\">\$ 109.31</span>
            </div>
            <div class=\"cartButton\" id=\"itemToCart\">
                <i class=\"uil uil-plus-circle icon\"></i>
                <span>Add To Cart</span>
            </div>
        </div>
        <div class=\"sectionItem \">
            <div class=\"itemImageDiv\">
                <img src=\"";
        // line 404
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/Images/pad.png"), "html", null, true);
        echo "\" alt=\"Image\">
            </div>
            <div class=\"itemDetails\">
                <span class=\"name\">Gaming Pad</span>
                <small>PS4 Wireless</small>
                <span class=\"itemPrice\">\$ 494.51</span>
            </div>
            <div class=\"cartButton\" id=\"itemToCart\">
                <i class=\"uil uil-plus-circle icon\"></i>
                <span>Add To Cart</span>
            </div>
        </div>
    </div>
    <div class=\"sectionBody toAddSection grid\" id=\"hidden\" style=\"gap: 3rem;\">
        <div class=\"sectionItem\">
            <div class=\"itemImageDiv\">
                <img src=\"";
        // line 420
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/Images/game1.png"), "html", null, true);
        echo "\" alt=\"Image\">
            </div>
            <div class=\"itemDetails\">
                <span class=\"name\">Gattling Gears</span>
                <small>Windows Game</small>
                <span class=\"itemPrice\">\$ 169.01</span>
            </div>
            <div class=\"cartButton\" id=\"itemToCart\">
                <i class=\"uil uil-plus-circle icon\"></i>
                <span>Add To Cart</span>
            </div>
        </div>
        <div class=\"sectionItem \">
            <div class=\"itemImageDiv\">
                <img src=\"";
        // line 434
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/Images/game3.png"), "html", null, true);
        echo "\" alt=\"Image\">
            </div>
            <div class=\"itemDetails\">
                <span class=\"name\">Gears of War</span>
                <small>Windows Game</small>
                <span class=\"itemPrice\">\$ 128</span>
            </div>
            <div class=\"cartButton\" id=\"itemToCart\">
                <i class=\"uil uil-plus-circle icon\"></i>
                <span>Add To Cart</span>
            </div>
        </div>
        <div class=\"sectionItem \">
            <div class=\"itemImageDiv\">
                <img src=\"";
        // line 448
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/Images/game4.png"), "html", null, true);
        echo "\" alt=\"Image\">
            </div>
            <div class=\"itemDetails\">
                <span class=\"name\">Metal Gear</span>
                <small>Solid One</small>
                <span class=\"itemPrice\">\$ 209.31</span>
            </div>
            <div class=\"cartButton\" id=\"itemToCart\">
                <i class=\"uil uil-plus-circle icon\"></i>
                <span>Add To Cart</span>
            </div>
        </div>
        <div class=\"sectionItem \">
            <div class=\"itemImageDiv\">
                <img src=\"";
        // line 462
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/Images/game2.png"), "html", null, true);
        echo "\" alt=\"Image\">
            </div>
            <div class=\"itemDetails\">
                <span class=\"name\">Metal Gear </span>
                <small>Solid Two</small>
                <span class=\"itemPrice\">\$ 294.51</span>
            </div>
            <div class=\"cartButton\" id=\"itemToCart\">
                <i class=\"uil uil-plus-circle icon\"></i>
                <span>Add To Cart</span>
            </div>
        </div>
    </div>
</div>

<!-- =====================Test Players ============================== -->
<div class=\"playerSection section grid container\" id=\"test\">
    <div class=\"ItemCard \">
        <div class=\"cardText\">
            <div class=\"cardPrice\">
                <small>Video test of gaming gears</small>
              
            </div>
            <div class=\"itemNameDiv\">
                <span class=\"name\">Gear Tests by ProGammers </span>
                <div class=\"cartButton\">
                    <i class=\"uil uil-minus-circle icon\"></i>
                    <span>watch vedios</span>
                </div>
            </div>
        </div>

        <div class=\"itemImage\">
            <img src=\"";
        // line 495
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/Images/g1.png"), "html", null, true);
        echo "\" alt=\"Player Image\" class=\"blackImage\" >
        </div>
    </div>
    <div class=\"ItemCard \">
        <div class=\"cardText\">
            <div class=\"cardPrice\">
                <small>Tricky tips in CS,GO and Dota 2</small>
            
            </div>
            <div class=\"itemNameDiv\">
                <span class=\"name\">Game Tips <br>Thanks to Pros</span>
                <div class=\"cartButton\">
                    <i class=\"uil uil-minus-circle icon\"></i>
                    <span>watch vedios</span>
                </div>
            </div>
        </div>

        <div class=\"itemImage\">
            <img src=\"";
        // line 514
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/Images/g2.png"), "html", null, true);
        echo "\" alt=\"Mice Image\" class=\"redImage\" >
        </div>
    </div>
    <div class=\"contactDiv \">
        <div class=\"divLeft\">
            <h2 class=\"title\">Newsletter</h2>
            <input type=\"text\" placeholder=\"ENTER YOUR E-MAIL\">
        </div>
        <div class=\"divRight\">
            <small>Subscribe to not miss any od promotions or our new videos with gamers</small>
            <div class=\"cartButton\">
                <i class=\"uil uil-plus-circle icon\"></i>
                <span>subscribe</span>
            </div>
        </div>

    </div>
</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 535
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer"));

        // line 536
        echo "    <div class=\"footerSection  container\">
        <div class=\"containerLeft grid\">
            <div class=\"socialIcons grid\">
                <i class=\"uil uil-facebook-f icon\"></i>
                <i class=\"uil uil-instagram icon\"></i>
                <i class=\"uil uil-twitter icon\"></i>
                <i class=\"uil uil-youtube icon\"></i>
            </div>
            <div class=\"textList grid\">
                <span>Mouses</span>
                <span>Keyboards</span>
                <span>Mousepads</span>
                <span>Headsets</span>
            </div>
            <div class=\"textList grid\">
                <span>Computers</span>
                <span>Accesories</span>
                <span>Bags</span>
                <span>Consoles</span>
            </div>
            <div class=\"textList grid\">
                <span>Register</span>
                <span>Login</span>
                <span>About</span>
                <span>FAQs</span>
            </div>
            <div class=\"textList grid\">
                <span>Contact Us</span>
                <span>Warranty Policy</span>
                <span>Terms of Use</span>
                <span>Affiliations</span>
            </div>
        </div>
        <div class=\"containerRight\">
            <p>Good-quality video games offer lots of benefits to children and teens. ..increase children's self-confidence and self-esteem as they master games. provide points of common interest and opportunities for socialization. develop skills in reading, math, technology and problem-solving.</p>
            <div class=\"contactNumber\">
                <span class=\"title\">Contact Support</span>
                <span class=\"number\">+216 53 140 939</span>
            </div>
        </div>
    </div>
    
    
    <div class=\"footerBottomSection container\">
      <small>Copyright &copy; TheAces 2022. All rights registered</small>
      <div class=\"footerLogo\">
        TheAces
      </div>
    </div>
    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 587
    public function block_cart($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "cart"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "cart"));

        // line 588
        echo "<div class=\"cart\" id=\"cartDiv\" >
    <div class=\"cartItem\">
        <div class=\"closeIconDiv\" id=\"closeCartIcon\">
            <i class=\"uil uil-times-circle icon closeIcon\"></i>
           </div>
        <div class=\"cartTitle\">
            <h2>Empty Cart.. </h2>
        </div>
       <div class=\"itemsAdded\" id=\"itemsInCart\">
       </div>

       <div class=\"paymentDiv\">
        <div class=\"divDetails\">
            <div class=\"paymentTitle\">
                <h2>Card details </h1>
            </div>
            <span>SELECT CARD TYPE</span>
        <img src=\"";
        // line 605
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/Images/payments.png"), "html", null, true);
        echo "\" alt=\"Payment method\">

        <form action=\"\">
            <input type=\"number\" placeholder=\"card number\">
            <div class=\"date__CVV\">
              <div>
                <label for=\"date\">expiry date</label>
                <input type=\"date\" id=\"date\">
              </div>
              <div>
                <label for=\"cvv\">CVV</label>
                <input type=\"text\" id=\"cvv\" placeholder=\"enter your 3 digits\">
              </div>

            </div>
            <button type=\"submit\">CHECKOUT</button>
        </form>
        </div>
        <div class=\"paymentFooter\">
            <p>We deliver immersive virtual reality experirnce that eencourages learnig, crativity and play at transport hubs,select retail and signficant venues. </p>
        </div>
    </div>
    </div>
    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 633
    public function block_js($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "js"));

        // line 634
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/swiper-bundle.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"https://unpkg.com/scrollreveal\"></script>
    <script src=\"";
        // line 636
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("Front/main.js"), "html", null, true);
        echo "\"></script>
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"></script>
    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js\"></script>
    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "baseFront.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  917 => 636,  911 => 634,  901 => 633,  867 => 605,  848 => 588,  838 => 587,  779 => 536,  769 => 535,  740 => 514,  718 => 495,  682 => 462,  665 => 448,  648 => 434,  631 => 420,  612 => 404,  595 => 390,  578 => 376,  561 => 362,  523 => 327,  506 => 313,  489 => 299,  472 => 285,  443 => 259,  421 => 240,  399 => 221,  377 => 202,  346 => 174,  320 => 151,  294 => 127,  284 => 126,  240 => 89,  230 => 88,  218 => 84,  214 => 83,  210 => 82,  135 => 9,  125 => 8,  106 => 7,  95 => 640,  93 => 633,  87 => 629,  85 => 587,  82 => 586,  80 => 535,  76 => 533,  74 => 126,  70 => 124,  68 => 88,  64 => 86,  62 => 8,  58 => 7,  50 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>{% block title %}Gaming Gear Website{% endblock %}</title>
    {% block css %}
    <style>
        .dropbtn {
          background-color: #4CAF50;
          color: white;
          padding: 16px;
          font-size: 16px;
          border: none;
          cursor: pointer;
        }
        
        .dropdown {
          position: relative;
          display: inline-block;
        }
        
        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f9f9f9;
          min-width: 160px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }
        
        .dropdown-content a {
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
        }
        
        .dropdown-content a:hover {background-color: #f1f1f1}
        
        .dropdown:hover .dropdown-content {
          display: block;
        }
        
        .dropdown:hover .dropbtn {
          background-color: #3e8e41;
        }
        </style>
        
    <style>
        fieldset {
            background-color : white;
        }
    </style>
    <style>
        #customers {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        #customers td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;
        }
        
        #customers tr:nth-child(even){background-color: #f2f2f2;}
        #customers tr:nth-child(odd){background-color: #f2f2f2;}
        
        #customers tr:hover {background-color: #ddd;}
        
        #customers th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #04AA6D;
          color: white;
        }
        </style>
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"{{asset('Front/main.css')}} \">
    <link rel=\"stylesheet\" href=\"{{asset('https://unicons.iconscout.com/release/v4.0.0/css/line.css')}} \">
    <link rel=\"stylesheet\" href=\"{{asset('Front/swiper-bundle.min.css')}}\">
    {% endblock %}
</head>
<body>
    {% block header %}
    <!-- ========================= Header Section -->
    <header class=\"header \" id=\"header\">
        <div class=\"logoDiv\">
           <a href=\"test\"> <i class=\"uil uil-pagerduty icon logoIcon\"></i></a>
        </div>
        <div class=\"navBar\" id=\"navBar\">
            <ul class=\"navLists\">
                <li class=\"navItem\"><a href=\"test\" class=\"navLink\">Home</a></li>
            </ul>
           <div class=\"closeIconDiv\" id=\"closeIcon\">
            <i class=\"uil uil-times-circle icon closeIcon\"></i>
           </div>
        </div>
        <div class=\"toggleIconDiv\" id=\"toggleIcon\">
            <i class=\"uil uil-ellipsis-h icon\"></i>
        </div>
        <div class=\"accCart\">
            <div class=\"accDiv dropdown\">
                <i class=\"uil uil-user-circle icon  userIcon dropbtn\"></i>
                <div class=\"dropdown-content\">
                    <a href=\"afficher\">My Complaints</a>
                </div>
                <div class=\"plainName\">TheAces</div>
             
            </div>
            <div class=\"cartDiv\" id=\"cartIcon\">
                <i class=\"uil uil-shopping-bag icon\" ></i>
            </div>

            <div class=\"themeIconDiv\" id=\"themeIconDiv\">
                <i class=\"uil uil-sun icon\"></i>
            </div>
        </div>
    </header>
    {% endblock %}
    
<!-- ==================Main Section------============================== -->
    {% block content %}
    <div class=\"main\" id=\"home\">

        <div class=\"bannerOne swiper\">
            <div class=\"swiper-wrapper \">
                <div class=\"bannerContent grid swiper-slide\">
                    <h1 class=\"overlayText\">Mouse</h1>
                    <div class=\"mainTextDiv\">
                        <div>
                            <h1 class=\"mainTitle\">Mouse - <br> Steelseries <br>Sensei 310</h1>
                        </div>

                       <div>
                        <div class=\"price\">
                            <span class=\"previous\">\$999</span>
                            <span class=\"current\">\$470</span>
                        </div>

                        <div class=\"cartButton\">
                            <i class=\"uil uil-plus-circle icon\"></i>
                            <span>Add To Cart</span>
                        </div>
                       </div>
                    </div>
                    <div class=\"bannerImageDiv\">
                        <img src=\"{{asset('Front/Images/mouse2.png')}}\" alt=\"Mouse image\">
                    </div>
                </div>
                <div class=\"bannerContent grid swiper-slide\">
                    <!-- <h1 class=\"overlayText\">Computer</h1> -->
                    <div class=\"mainTextDiv\">
                        <div>
                            <h1 class=\"mainTitle\">Beats Studio3 <br>Wireless <br> Midnight Black</h1>
                        </div>

                        <div>
                            <div class=\"price\">
                                <span class=\"previous\">\$500</span>
                                <span class=\"current\">\$245</span>
                            </div>
    
                            <div class=\"cartButton\">
                                <i class=\"uil uil-plus-circle icon\"></i>
                                <span>Add To Cart</span>
                            </div>
                        </div>
                    </div>
                    <div class=\"bannerImageDiv\">
                        <img src=\"{{asset('Front/Images/beats.png')}}\"\" alt=\"Mouse image\">
                    </div>
                </div>
                
            </div>
            <div class=\"swiper-pagination\"></div>
        </div>
    </div>

    <!-- =======================browser Section=========================== -->

    <div class=\"browser section container\" id=\"browser\">
        <div class=\"ItemCard grid browserOne \">
            <div class=\"cardText\">
                <div class=\"cardPrice\">
                    <small>Starting from ...</small>
                    <span class=\"price\">\$ 29</span>
                </div>
                <div class=\"itemNameDiv\">
                    <span class=\"name\">Mice</span>
                    <div class=\"cartButton\">
                        <i class=\"uil uil-minus-circle icon\"></i>
                        <span>Browse</span>
                    </div>
                </div>
            </div>

            <div class=\"itemImage\">
                <img src=\"{{asset('Front/Images/mouse.png')}}\" alt=\"Mice Image\" >
            </div>
        </div>
        <div class=\"ItemCard grid browserFour \">
            <div class=\"cardText\">
                <div class=\"cardPrice\">
                    <small>Starting from ...</small>
                    <span class=\"price\">\$ 1,400</span>
                </div>
                <div class=\"itemNameDiv\">
                    <span class=\"name\">Curved Monitor</span>
                    <div class=\"cartButton\">
                        <i class=\"uil uil-minus-circle icon\"></i>
                        <span>Browse</span>
                    </div>
                </div>
            </div>

            <div class=\"itemImage\">
                <img src=\"{{asset('Front/Images/tv.png')}}\" alt=\"Mice Image\" >
            </div>
        </div>
        <div class=\"ItemCard grid browserTwo \">
            <div class=\"cardText\">
                <div class=\"cardPrice\">
                    <small>Starting from ...</small>
                    <span class=\"price\">\$ 546</span>
                </div>
                <div class=\"itemNameDiv\">
                    <span class=\"name\">Turturus v6</span>
                    <div class=\"cartButton\">
                        <i class=\"uil uil-minus-circle icon\"></i>
                        <span>Browse</span>
                    </div>
                </div>
            </div>

            <div class=\"itemImage\">
                <img src=\"{{asset('Front/Images/turturus v6.png')}}\" alt=\"Mice Image\" >
            </div>
        </div>
        <div class=\"ItemCard grid browserThree \">
            <div class=\"cardText\">
                <div class=\"cardPrice\">
                    <small>Starting from ...</small>
                    <span class=\"price\">\$ 24</span>
                </div>
                <div class=\"itemNameDiv\">
                    <span class=\"name\">Keyboard</span>
                    <div class=\"cartButton\">
                        <i class=\"uil uil-minus-circle icon\"></i>
                        <span>Browse</span>
                    </div>
                </div>
            </div>

            <div class=\"itemImage\">
                <img src=\"{{asset('Front/Images/keyboard2.png')}}\" alt=\"Mice Image\">
            </div>
        </div>
        
    </div>

    <!-- ===============Featured Items===================================== -->

    <div class=\"featured section container\" id=\"features\">
        <div class=\"sectionTop \">
            <div class=\"introText \">
                <h2 class=\"sectionTitle\">
                    Featured Gears
                </h2>
                <p> Here are some of the features items to enhace you gaming experience. You deserve  great gear for unforgattable experience!  </p>
            </div>
            <div class=\"cartButton\" >
                <i class=\"uil uil-minus-circle icon\"></i>
                <span>Browse</span>
            </div>
        </div>

       <div class=\"sectionBody swiper\">
        <div class=\"swiper-wrapper\">
            <div class=\"sectionItem swiper-slide\">
                <div class=\"itemImageDiv\">
                    <img src=\"{{asset('Front/Images/earpod.png')}}\" alt=\"Image\">
                </div>
                <div class=\"itemDetails\">
                    <span class=\"name\">Earpod</span>
                    <small>Wireless</small>
                    <span class=\"itemPrice\">\$ 69.01</span>
                </div>
                <div class=\"cartButton\" id=\"itemToCart\">
                    <i class=\"uil uil-plus-circle icon\"></i>
                    <span>Add To Cart</span>
                </div>
            </div>
            <div class=\"sectionItem swiper-slide\">
                <div class=\"itemImageDiv\">
                    <img src=\"{{asset('Front/Images/computer2.png')}}\" alt=\"Image\">
                </div>
                <div class=\"itemDetails\">
                    <span class=\"name\">Laptop</span>
                    <small>Gaming Laptop</small>
                    <span class=\"itemPrice\">\$ 1,228</span>
                </div>
                <div class=\"cartButton\" id=\"itemToCart\">
                    <i class=\"uil uil-plus-circle icon\"></i>
                    <span>Add To Cart</span>
                </div>
            </div>
            <div class=\"sectionItem swiper-slide\">
                <div class=\"itemImageDiv\">
                    <img src=\"{{asset('Front/Images/keyboard.png')}}\" alt=\"Image\">
                </div>
                <div class=\"itemDetails\">
                    <span class=\"name\">Moucepad</span>
                    <small>Smooth rubber</small>
                    <span class=\"itemPrice\">\$ 19.31</span>
                </div>
                <div class=\"cartButton\" id=\"itemToCart\">
                    <i class=\"uil uil-plus-circle icon\"></i>
                    <span>Add To Cart</span>
                </div>
            </div>
            <div class=\"sectionItem swiper-slide\">
                <div class=\"itemImageDiv\">
                    <img src=\"{{asset('Front/Images/gaming chair.png')}}\" alt=\"Image\">
                </div>
                <div class=\"itemDetails\">
                    <span class=\"name\">Gaming Chair</span>
                    <small>Extendable</small>
                    <span class=\"itemPrice\">\$ 494.51</span>
                </div>
                <div class=\"cartButton\" id=\"itemToCart\">
                    <i class=\"uil uil-plus-circle icon\"></i>
                    <span>Add To Cart</span>
                </div>
            </div>
        </div>
       </div>
    </div>

<!-- ========================New Gear================================ -->

<div class=\"newGear section container\" id=\"newgear\">
    <div class=\"sectionTop \">
        <div class=\"introText \">
            <h2 class=\"sectionTitle\">
                New Gears Collection
            </h2>
            <p> Here is the selection of the new and upgraded techno gear for your gaming 2022!  </p>
        </div>
        <div class=\"cartButton\">
            <i class=\"uil uil-minus-circle icon\"></i>
            <span id=\"moreBtn\">More</span>
        </div>
    </div>

    <div class=\"sectionBody grid\" style=\"gap: 3rem;\">
        <div class=\"sectionItem\">
            <div class=\"itemImageDiv\">
                <img src=\"{{asset('Front/Images/cable.png')}}\" alt=\"Image\">
            </div>
            <div class=\"itemDetails\">
                <span class=\"name\">USB Cables</span>
                <small>original Black</small>
                <span class=\"itemPrice\">\$ 19.01</span>
            </div>
            <div class=\"cartButton\" id=\"itemToCart\">
                <i class=\"uil uil-plus-circle icon\"></i>
                <span>Add To Cart</span>
            </div>
        </div>
        <div class=\"sectionItem \">
            <div class=\"itemImageDiv\">
                <img src=\"{{asset('Front/Images/mic.png')}}\" alt=\"Image\">
            </div>
            <div class=\"itemDetails\">
                <span class=\"name\">Microphone</span>
                <small>Great Sound</small>
                <span class=\"itemPrice\">\$ 428</span>
            </div>
            <div class=\"cartButton\" id=\"itemToCart\">
                <i class=\"uil uil-plus-circle icon\"></i>
                <span>Add To Cart</span>
            </div>
        </div>
        <div class=\"sectionItem \">
            <div class=\"itemImageDiv\">
                <img src=\"{{asset('Front/Images/router.png')}}\" alt=\"Image\">
            </div>
            <div class=\"itemDetails\">
                <span class=\"name\">WiFi Routers</span>
                <small>Hight band width</small>
                <span class=\"itemPrice\">\$ 109.31</span>
            </div>
            <div class=\"cartButton\" id=\"itemToCart\">
                <i class=\"uil uil-plus-circle icon\"></i>
                <span>Add To Cart</span>
            </div>
        </div>
        <div class=\"sectionItem \">
            <div class=\"itemImageDiv\">
                <img src=\"{{asset('Front/Images/pad.png')}}\" alt=\"Image\">
            </div>
            <div class=\"itemDetails\">
                <span class=\"name\">Gaming Pad</span>
                <small>PS4 Wireless</small>
                <span class=\"itemPrice\">\$ 494.51</span>
            </div>
            <div class=\"cartButton\" id=\"itemToCart\">
                <i class=\"uil uil-plus-circle icon\"></i>
                <span>Add To Cart</span>
            </div>
        </div>
    </div>
    <div class=\"sectionBody toAddSection grid\" id=\"hidden\" style=\"gap: 3rem;\">
        <div class=\"sectionItem\">
            <div class=\"itemImageDiv\">
                <img src=\"{{asset('Front/Images/game1.png')}}\" alt=\"Image\">
            </div>
            <div class=\"itemDetails\">
                <span class=\"name\">Gattling Gears</span>
                <small>Windows Game</small>
                <span class=\"itemPrice\">\$ 169.01</span>
            </div>
            <div class=\"cartButton\" id=\"itemToCart\">
                <i class=\"uil uil-plus-circle icon\"></i>
                <span>Add To Cart</span>
            </div>
        </div>
        <div class=\"sectionItem \">
            <div class=\"itemImageDiv\">
                <img src=\"{{asset('Front/Images/game3.png')}}\" alt=\"Image\">
            </div>
            <div class=\"itemDetails\">
                <span class=\"name\">Gears of War</span>
                <small>Windows Game</small>
                <span class=\"itemPrice\">\$ 128</span>
            </div>
            <div class=\"cartButton\" id=\"itemToCart\">
                <i class=\"uil uil-plus-circle icon\"></i>
                <span>Add To Cart</span>
            </div>
        </div>
        <div class=\"sectionItem \">
            <div class=\"itemImageDiv\">
                <img src=\"{{asset('Front/Images/game4.png')}}\" alt=\"Image\">
            </div>
            <div class=\"itemDetails\">
                <span class=\"name\">Metal Gear</span>
                <small>Solid One</small>
                <span class=\"itemPrice\">\$ 209.31</span>
            </div>
            <div class=\"cartButton\" id=\"itemToCart\">
                <i class=\"uil uil-plus-circle icon\"></i>
                <span>Add To Cart</span>
            </div>
        </div>
        <div class=\"sectionItem \">
            <div class=\"itemImageDiv\">
                <img src=\"{{asset('Front/Images/game2.png')}}\" alt=\"Image\">
            </div>
            <div class=\"itemDetails\">
                <span class=\"name\">Metal Gear </span>
                <small>Solid Two</small>
                <span class=\"itemPrice\">\$ 294.51</span>
            </div>
            <div class=\"cartButton\" id=\"itemToCart\">
                <i class=\"uil uil-plus-circle icon\"></i>
                <span>Add To Cart</span>
            </div>
        </div>
    </div>
</div>

<!-- =====================Test Players ============================== -->
<div class=\"playerSection section grid container\" id=\"test\">
    <div class=\"ItemCard \">
        <div class=\"cardText\">
            <div class=\"cardPrice\">
                <small>Video test of gaming gears</small>
              
            </div>
            <div class=\"itemNameDiv\">
                <span class=\"name\">Gear Tests by ProGammers </span>
                <div class=\"cartButton\">
                    <i class=\"uil uil-minus-circle icon\"></i>
                    <span>watch vedios</span>
                </div>
            </div>
        </div>

        <div class=\"itemImage\">
            <img src=\"{{asset('Front/Images/g1.png')}}\" alt=\"Player Image\" class=\"blackImage\" >
        </div>
    </div>
    <div class=\"ItemCard \">
        <div class=\"cardText\">
            <div class=\"cardPrice\">
                <small>Tricky tips in CS,GO and Dota 2</small>
            
            </div>
            <div class=\"itemNameDiv\">
                <span class=\"name\">Game Tips <br>Thanks to Pros</span>
                <div class=\"cartButton\">
                    <i class=\"uil uil-minus-circle icon\"></i>
                    <span>watch vedios</span>
                </div>
            </div>
        </div>

        <div class=\"itemImage\">
            <img src=\"{{asset('Front/Images/g2.png')}}\" alt=\"Mice Image\" class=\"redImage\" >
        </div>
    </div>
    <div class=\"contactDiv \">
        <div class=\"divLeft\">
            <h2 class=\"title\">Newsletter</h2>
            <input type=\"text\" placeholder=\"ENTER YOUR E-MAIL\">
        </div>
        <div class=\"divRight\">
            <small>Subscribe to not miss any od promotions or our new videos with gamers</small>
            <div class=\"cartButton\">
                <i class=\"uil uil-plus-circle icon\"></i>
                <span>subscribe</span>
            </div>
        </div>

    </div>
</div>
{% endblock %}

<div class=\"footer\">
    {% block footer %}
    <div class=\"footerSection  container\">
        <div class=\"containerLeft grid\">
            <div class=\"socialIcons grid\">
                <i class=\"uil uil-facebook-f icon\"></i>
                <i class=\"uil uil-instagram icon\"></i>
                <i class=\"uil uil-twitter icon\"></i>
                <i class=\"uil uil-youtube icon\"></i>
            </div>
            <div class=\"textList grid\">
                <span>Mouses</span>
                <span>Keyboards</span>
                <span>Mousepads</span>
                <span>Headsets</span>
            </div>
            <div class=\"textList grid\">
                <span>Computers</span>
                <span>Accesories</span>
                <span>Bags</span>
                <span>Consoles</span>
            </div>
            <div class=\"textList grid\">
                <span>Register</span>
                <span>Login</span>
                <span>About</span>
                <span>FAQs</span>
            </div>
            <div class=\"textList grid\">
                <span>Contact Us</span>
                <span>Warranty Policy</span>
                <span>Terms of Use</span>
                <span>Affiliations</span>
            </div>
        </div>
        <div class=\"containerRight\">
            <p>Good-quality video games offer lots of benefits to children and teens. ..increase children's self-confidence and self-esteem as they master games. provide points of common interest and opportunities for socialization. develop skills in reading, math, technology and problem-solving.</p>
            <div class=\"contactNumber\">
                <span class=\"title\">Contact Support</span>
                <span class=\"number\">+216 53 140 939</span>
            </div>
        </div>
    </div>
    
    
    <div class=\"footerBottomSection container\">
      <small>Copyright &copy; TheAces 2022. All rights registered</small>
      <div class=\"footerLogo\">
        TheAces
      </div>
    </div>
    {% endblock %}
</div>
{% block cart %}
<div class=\"cart\" id=\"cartDiv\" >
    <div class=\"cartItem\">
        <div class=\"closeIconDiv\" id=\"closeCartIcon\">
            <i class=\"uil uil-times-circle icon closeIcon\"></i>
           </div>
        <div class=\"cartTitle\">
            <h2>Empty Cart.. </h2>
        </div>
       <div class=\"itemsAdded\" id=\"itemsInCart\">
       </div>

       <div class=\"paymentDiv\">
        <div class=\"divDetails\">
            <div class=\"paymentTitle\">
                <h2>Card details </h1>
            </div>
            <span>SELECT CARD TYPE</span>
        <img src=\"{{asset('Front/Images/payments.png')}}\" alt=\"Payment method\">

        <form action=\"\">
            <input type=\"number\" placeholder=\"card number\">
            <div class=\"date__CVV\">
              <div>
                <label for=\"date\">expiry date</label>
                <input type=\"date\" id=\"date\">
              </div>
              <div>
                <label for=\"cvv\">CVV</label>
                <input type=\"text\" id=\"cvv\" placeholder=\"enter your 3 digits\">
              </div>

            </div>
            <button type=\"submit\">CHECKOUT</button>
        </form>
        </div>
        <div class=\"paymentFooter\">
            <p>We deliver immersive virtual reality experirnce that eencourages learnig, crativity and play at transport hubs,select retail and signficant venues. </p>
        </div>
    </div>
    </div>
    {% endblock %}

    
</div>

    {% block js %}
    <script src=\"{{asset('Front/swiper-bundle.min.js')}}\"></script>
    <script src=\"https://unpkg.com/scrollreveal\"></script>
    <script src=\"{{asset('Front/main.js')}}\"></script>
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js\"></script>
    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js\"></script>
    {% endblock %}
</body>
</html>", "baseFront.html.twig", "C:\\Users\\MSI\\Desktop\\Esprit\\S2\\theAcesRep\\TheAces\\templates\\baseFront.html.twig");
    }
}
