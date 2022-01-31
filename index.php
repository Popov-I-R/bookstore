<?php

require_once 'header.php';

$query = "SELECT books.* FROM books LIMIT 3";
$result = $conn->query($query);


?>

<html>
    <head>

        <style>

           
            
            
            
            
            .carousel-caption {
                position: absolute;
                bottom: 44%;
                left: -42%;
                font-size: 30px;
                color: #cc00ff
            }

            .carousel-caption1 {
                position: absolute;
                bottom: 34%;
                left: -2%;
                font-size: 21%;
                font-style: italic;
                color: #00ffe7;
                text-shadow: 0 9px 7px rgb(0 0 0 / 60%);
                margin-right: 37rem;
                margin-left: 4.9rem;
                line-height: 0 !important;
            }

            .slider-btn a{
                position: absolute;
                color: #00fdf1;
                border-color: #ce00ff;
                text-decoration: none;
                left: 35%;
                bottom: 25%;
                border-style: solid;
                padding-left: 15px;
                padding-right: 15px;
                padding-top: 1px;
                padding-bottom: 1px;
                border-radius: 0.35rem;
                font-size: 23px;
            }
            

            .slider-btn a:hover{
                background-color: #1cb94e;
                color: black;

                padding-left: 19px;
                padding-right: 17px;
                padding-top: 2px;
                padding-bottom: 2px;
                border-radius: 0.45rem;

            }

            .carousel-captionslide2 {
    position: absolute;
    bottom: 42%;
    left: 13%;
    /* font-size: 22%; */
    font-family: serif;
    font-style: italic;
    color: #ffffff;
            }
            .carousel-captionslide2> p {
                font-size: 65px;
                text-shadow: 0 7px 4px rgb(0 0 0 / 60%);
            }

            .carousel-caption1slide2 {
    position: absolute;
    bottom: 32%;
    left: -16%;
    font-size: 12px;
    font-family: serif;
    font-style: italic;
    color: white;
    text-shadow: 0 8px 25px rgb(0 0 0 / 60%);
    margin-left: 34%;
    margin-right: 48%;
            }

            .slider-btnslide2 a{
    position: absolute;
    color: rgb(253 253 253);
    /* background-color: yellow; */
    border-color: #7ca503;
    border-style: solid;
    width: 15;
    text-decoration: none;
    left: 34%;
    bottom: 26%;
    padding-left: 20px;
    padding-right: 20px;
    padding-top: 2px;
    padding-bottom: 2px;
    border-radius: 0.35rem;
    font-size: 97%;
            }

            .slider-btnslide2 a:hover{
                border-color: yellow;
                background-color: #ffffff;
                color: black;
                padding-left: 25px;
                padding-right: 23px;
                padding-top: 3px;
                padding-bottom: 3px;
                border-radius: 0.55rem;

            }
            
            .carousel-captionslide3 {
    position: absolute;
    bottom: 68%;
    left: 15%;
    /* font-size: 22%; */
    font-family: serif;
    font-style: italic;
    color: #000000;
            }
            .carousel-captionslide3> h2 {
font-size: 284%;
    text-shadow: 0 17px 4px rgb(103 5 33 / 81%);
            }

            .carousel-caption1slide3 {
position: absolute;
    bottom: 48%;
    left: -20%;
    font-size: 12px;
    font-family: serif;
    font-style: italic;
    color: white;
    text-shadow: 4 33px 45px rgb(0 22 41 / 63%);
    margin-left: 34%;
    margin-right: 48%;
            }

            .slider-btnslide3 a{
position: absolute;
    color: rgb(255 254 254);
    /* background-color: yellow; */
    border-color: #a50303;
    border-style: solid;
    width: 15;
    text-decoration: none;
    left: 38%;
    bottom: 22%;
    padding-left: 20px;
    padding-right: 20px;
    padding-top: 2px;
    padding-bottom: 2px;
    border-radius: 0.35rem;
    font-size: 95%;
            }

            .slider-btnslide3 a:hover{
                border-color: yellow;
                background-color: #ffffff;
                color: black;
                padding-left: 25px;
                padding-right: 23px;
                padding-top: 3px;
                padding-bottom: 3px;
                border-radius: 0.55rem;

            }
            
            .shop-image {
                margin-right: 15px;
            }

            .carousel-inner {
                height: 543px;
            }
            
            
/* Старт на css-a за логото          */
            



#canvas-container-1{
margin-left:50%;
max-height: 255px;
max-width: 255px;
background: black;
}

#canvas-1{
  display: block;
  position: relative;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width:255px;
  height:255px;
}

.canvas-stats {
    display:none;
}
            
        </style>
    </head>
    <body>

        <!-- Page content holder -->
        <div class="page-content p-1" id="content">

            <div id="canvas-container-1" class="canvas-container">
  <canvas id="canvas-1"></canvas>
</div>




<script src="http://threejs.org/build/three.min.js"></script>
<script src="http://threejs.org/examples/js/libs/stats.min.js"></script>




            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
<!--                    <form class="product-form">
                        <div class="col d-flex align-items-start book-item">
                            <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                                <img width="150" src="<?php echo URLBASE . '/backend/uploads/' . $row['image'] ?>">
                            </div>
                            <div>
                                <h2> 
                                    <a href="<?php echo URLBASE ?>/book-template.php?id=<?php echo $row['id']; ?>">
                                        <?php echo htmlspecialchars($row['title']) ?></a>
                                </h2>
                                <?php $des = htmlspecialchars($row['description']) ?>
                                <p><?php echo (strlen($des) > 200) ? substr($des, 0, 200) . '...' : $des ?></p>
                                <h3><?php echo htmlspecialchars($row['price']) ?></h3>
                                <input type="hidden" value="1" name="book_qty">
                                <input type="hidden" value="<?php echo $row['id']; ?>" name="book_id">
                                <button type="submit" class="mt-3 btn btn-primary add-cart">
                                    Add to cart
                                </button>
                            </div>
                        </div>
                    </form>-->
                    <?php
                }
            }
            ?>
            
            
            
            <section class="hero-area hero-slider-4">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1 ">
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"  aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"  aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                   
                                    <div class="carousel-item active" data-bs-interval="1333000">
                                         
                                        <img src="<?php echo URLBASE; ?>/backend/uploads/fantasy1.jpg" class="d-block w-100" alt="reading1">
                                        <div class="carousel-caption">
                                            <h2>Фантастика</h2>
                                        </div>
                                        <div class="carousel-caption1">
                                            <p>За всички имащи въображение</p>
                                        </div>
                                        <div class="slider-btn">
                                            <a href="<?php echo URLBASE; ?>/categories-template.php?id=1">Пазарувай сега</a>
                                        </div>

                                    </div>
                                    <div class="carousel-item" data-bs-interval="111113000">
                                        <img src="<?php echo URLBASE; ?>/backend/uploads/history1.jpg" class="d-block w-100" alt="reading2">
                                        <div class="carousel-captionslide2">
                                            <h2>История</p></h2>
                                        </div>
                                        <div class="carousel-caption1slide2">
                                            <p>Защото не трябва да забравяме от къде сме тръгнали...</p>
                                        </div>
                                        <div class="slider-btnslide2">
                                            <a href="<?php echo URLBASE; ?>/categories-template.php?id=2">Пазарувай сега</a>
                                        </div>
                                    </div>
                                    <div class="carousel-item" data-bs-interval="111113000">
                                        <img src="<?php echo URLBASE; ?>/backend/uploads/horror.jpg" class="d-block w-100" alt="reading3">
                                        <div class="carousel-captionslide3">
                                            <h2>Ужаси</h2>
                                        </div>
                                        <div class="carousel-caption1slide3">
                                            <p>На неподходящото място... <br> в неподходящият момент...</p>
                                        </div>
                                        <div class="slider-btnslide3">
                                            <a href="<?php echo URLBASE; ?>/categories-template.php?id=10">Пазарувай сега</a>
                                        </div>
                                    </div>

                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        </div>

        <!--END-->

    </body>

</html>



<?php
include_once 'footer.php';



?>
<script>
   function ThreeJSCanvas(CANVAS_ID) {
  
    var SCREEN_HEIGHT = Math.min(window.innerWidth, window.innerHeight);
    var SCREEN_WIDTH = SCREEN_HEIGHT;
    var SCREEN_ASPECT_RATIO = SCREEN_WIDTH / SCREEN_HEIGHT;
    var canvas, container;

    var container, loader, stats;
    var renderer, camera, scene;
    var raycaster, controls;

    var ANIMATION_FRAME_LENGTH = 30,
        INTERACT_DISTANCE = 2.5;
    var objetArray = [],
        animationQueue = [];

    var color1 = [0 / 255, 110 / 255, 255 / 255],
        color2 = [0 / 255, 255 / 255, 140 / 255];

    var bitmap = [];
    var BITMAP_SKIP = 1;

    var fov = 90;
    var cameraPos = [0, 0, 30];
    var cameraLookAt = [0, 0, 0];
    var viewHeight = 2 * Math.tan(THREE.Math.degToRad(fov / 2)) * cameraPos[2],
        viewWidth = viewHeight * SCREEN_ASPECT_RATIO;
    var mouse = new THREE.Vector3(10000, 10000, -1),
        mouseScaled = new THREE.Vector3(10000, 10000, -1);

    var frame = 0;

    function init() {

        // Global Variables
        container = document.getElementById("canvas-container-" + CANVAS_ID);
        canvas = document.getElementById("canvas-" + CANVAS_ID);
        canvas.addEventListener('mousemove', onDocumentMouseMove, false);

        loader = new THREE.JSONLoader();
        stats = new Stats();
        stats.domElement.classList.add("canvas-stats");
        stats.domElement.id = "canvas-stats-" + CANVAS_ID;

        /* If you are familiar with python and opencv
           you can use this python script to generate custom bitmaps 
           --------------------
           https://git.io/vdBAu 
           --------------------
        */
        var data =  
//                    '#1111110000000011111111111100000000011111' + 
//                    #0000000000000000000000000000000001000000
'#0000001111111100000000000011111111100000' +
'#0001101111111111100000011111111111111000' +
'#0001101111111111111000111111111111111010' +
'#0001101111111111111101111111111111111010' +
'#0001101111111111111101111111111111111010' +
'#0001101111111111111101111111111111111010' +
'#0001101111111111111101111111111111111010' +
'#0001101111111111111101111111111111111010' +
'#0001101111111111111101111111111111111010' +
'#0001101111111111111101111111111111111010' +
'#0001101111111111111101111111111111111010' +
'#0001101111111111111101111111111111111010' +
'#0001101111111111111101111111111111111010' +
'#0001101111111111111101111111111111111010' +
'#0001101111111111111101111111111111111010' +
'#0001101111111111111101111111111111111010' +
'#0001101111111111111101111111111111111010' +
'#0001101111111111111101111111111111111010' +
'#0001101111111111111101111111111111111010' +
'#0001101111111111111101111111111111111010' +
'#0001101111111111111101111111111111111010' +
'#0001101111111111111101111111111111111010' +
'#0001100000000111111101111111000000011010' +
'#0001100000000000111101110000000000001010' +
'#0000111111111100001101100011111111110010' +
'#0010000000000000000100000000000000000110' +
'#0001111111111111100000011111111111111000' +

                    '#';
      
                for (var i = 0; i < data.length; i++) {
                    if (data[i] == '#') {
                        bitmap.push([]);
                    }
                    else {
                        bitmap[bitmap.length - 1].push(data[i] - '0');
                    }
                }

        container.appendChild(stats.domElement);

        // Renderer
        renderer = new THREE.WebGLRenderer({
            alpha: true,
            antialias: true,
            canvas: canvas,
        });
        renderer.setClearColor(0x212121, 0);
        renderer.setPixelRatio(window.devicePixelRatio);
        renderer.shadowMap.enabled = true;
        renderer.shadowMap.type = THREE.PCFSoftShadowMap;
        renderer.setSize(SCREEN_WIDTH, SCREEN_HEIGHT);

        // Camera and Controls
        camera = new THREE.PerspectiveCamera(fov, SCREEN_ASPECT_RATIO, 0.1, 1000);
        // camera = new THREE.OrthographicCamera(-viewWidth, viewWidth, viewHeight, -viewHeight, 1, 300);
        camera.position.set(cameraPos[0], cameraPos[1], cameraPos[2]);
        camera.lookAt(new THREE.Vector3(cameraLookAt[0], cameraLookAt[1], cameraLookAt[2]));
        raycaster = new THREE.Raycaster();

        // controls = new THREE.OrbitControls(camera);
        // controls.rotateSpeed = 2.0;
        // controls.zoomSpeed = 2.0;
        // controls.enableZoom = true;
        // controls.enablePan = true;
        // controls.dampingFactor = 0.2;
        // controls.addEventListener('change', render);

        //Scene
        scene = new THREE.Scene();


        //Lights

        // Making Object Array
        var xOffset = -bitmap[0].length / (BITMAP_SKIP * 2);
        var yOffset = bitmap.length / (BITMAP_SKIP * 2);
        for (var i = 0; i < bitmap.length; i += BITMAP_SKIP) {
            for (var j = 0; j < bitmap[i].length; j += BITMAP_SKIP) {
                if (bitmap[i][j] == 1) {
                    planeGeometry = new THREE.PlaneGeometry(1, 1);
                    var circleGeometry = new THREE.CircleGeometry(1, 5);
                    var frac = i / bitmap.length;
                    // Materials
                    planeMaterial = new THREE.MeshBasicMaterial({
                        color: new THREE.Color(
                            color1[0] * frac + color2[0] * (1 - frac),
                            color1[1] * frac + color2[1] * (1 - frac),
                            color1[2] * frac + color2[2] * (1 - frac)
                        ),
                        transparent: true,
                        opacity: THREE.Math.randFloat(0.4, 0.6),
                        side: THREE.DoubleSide
                    });

                    var circleMaterial = new THREE.MeshBasicMaterial({
                        color: new THREE.Color(1, 1, 1),
                        transparent: true,
                        opacity: THREE.Math.randFloat(0.8, 1),
                        side: THREE.DoubleSide
                    });

                    // Mesh
                    planeMesh = new THREE.Mesh(planeGeometry, planeMaterial);
                    planeMesh.position.set(xOffset + j / BITMAP_SKIP, yOffset - i / BITMAP_SKIP, 0);
                    var randWidth = THREE.Math.randFloat(0.6, 1.2);
                    var randHeight = randWidth
                    planeMesh.scale.set(randWidth, randHeight, 1);
                    scene.add(planeMesh);
                    objetArray.push([planeMesh, false]);


                    circleMesh = new THREE.Mesh(circleGeometry, circleMaterial);
                    circleMesh.position.set(xOffset + j / BITMAP_SKIP + THREE.Math.randFloat(-0.5, 0.5), yOffset - i / BITMAP_SKIP + THREE.Math.randFloat(-0.5, 0.5), 0.1);
                    var randRadius = THREE.Math.randFloat(0.05, 0.1);
                    circleMesh.scale.set(randRadius, randRadius, 1);
                    scene.add(circleMesh);
                    objetArray.push([circleMesh, false]);
                }

            }
        }


        //Geometry 

        // Materials


        // Mesh


        // Helpers

        //Add Stuff to Scene


    }

    function animate() {

        requestAnimationFrame(animate);
        render();
        stats.update();
        // controls.update();
        frame++;
    }

    function render() {
        
            while (animationQueue.length > 0) {
                var obj_index = animationQueue[0][0];
                var ani_frame = animationQueue[0][1];
                if (ani_frame > ANIMATION_FRAME_LENGTH) {
                    objetArray[obj_index][1] = false;
                    animationQueue.shift();
                }
                else {
                    break;
                }
            }

            for (var i = 0; i < objetArray.length; i++) {
                var obj = objetArray[i][0];
                var isAnimating = objetArray[i][1];
                if (isAnimating == false) {
                    var px = obj.position.x;
                    var py = obj.position.y;
                    var dist = Math.sqrt(Math.pow(px - mouseScaled.x, 2) + Math.pow(py - mouseScaled.y, 2));
                    if (dist < INTERACT_DISTANCE) {
                        var startPosVector = obj.position.clone();
                        var mouseRepelVector = new THREE.Vector3().subVectors(startPosVector, mouseScaled).multiplyScalar(THREE.Math.randFloat(INTERACT_DISTANCE + 0.5, INTERACT_DISTANCE + 2) - dist);
                        var endPosVector = new THREE.Vector3().addVectors(startPosVector, mouseRepelVector);
                        animationQueue.push([i, 0, startPosVector, endPosVector]);
                        objetArray[i][1] = true;
                    }
                }
            }

            for (var i = 0; i < animationQueue.length; i++) {
                var obj = objetArray[animationQueue[i][0]][0];
                var ani_frame = animationQueue[i][1];
                var startPosVector = animationQueue[i][2];
                var endPosVector = animationQueue[i][3];
                var curPosVector = new THREE.Vector3();
                var frac = 1 - Math.abs(ani_frame - (ANIMATION_FRAME_LENGTH / 2)) / (ANIMATION_FRAME_LENGTH / 2);
                frac = easeOutQuad(frac);
                curPosVector.lerpVectors(startPosVector, endPosVector, frac);

                obj.position.x = curPosVector.x;
                obj.position.y = curPosVector.y;
                obj.position.z = curPosVector.z;
                animationQueue[i][1] += 1;
            }

            mouse = new THREE.Vector3(10000, 10000, -2);
            mouseScaled = new THREE.Vector3(10000, 10000, -2);

            renderer.render(scene, camera);
    }

    function onWindowResize() {
        SCREEN_HEIGHT = Math.min(window.innerWidth, window.innerHeight);
        SCREEN_WIDTH = SCREEN_HEIGHT;
        SCREEN_ASPECT_RATIO = SCREEN_WIDTH / SCREEN_HEIGHT;
        camera.aspect = SCREEN_ASPECT_RATIO;
        camera.updateProjectionMatrix();
        renderer.setSize(SCREEN_WIDTH, SCREEN_HEIGHT);
        console.log(SCREEN_WIDTH + "x" + SCREEN_HEIGHT)
    }

    function onDocumentMouseMove(event) {

        var rect = canvas.getBoundingClientRect();

        mouse.x = event.clientX - rect.left;
        mouse.y = event.clientY - rect.top;

        mouseScaled.x = mouse.x * viewWidth / SCREEN_WIDTH - viewWidth / 2;
        mouseScaled.y = -mouse.y * viewHeight / SCREEN_HEIGHT + viewHeight / 2;

    }

    function sigmoid(t) {
        return 1 / (1 + Math.pow(Math.E, -t));
    }

    // no easing, no acceleration
    function linear(t) {
        return t;
    }
    // accelerating from zero velocity
    function easeInQuad(t) {
        return t * t;
    }
    // decelerating to zero velocity
    function easeOutQuad(t) {
        return t * (2 - t);
    }
    // acceleration until halfway, then deceleration
    function easeInOutQuad(t) {
        return t < .5 ? 2 * t * t : -1 + (4 - 2 * t) * t;
    }
    // accelerating from zero velocity 
    function easeInCubic(t) {
        return t * t * t;
    }
    // decelerating to zero velocity 
    function easeOutCubic(t) {
        return (--t) * t * t + 1;
    }
    // acceleration until halfway, then deceleration 
    function easeInOutCubic(t) {
        return t < .5 ? 4 * t * t * t : (t - 1) * (2 * t - 2) * (2 * t - 2) + 1;
    }
    // accelerating from zero velocity 
    function easeInQuart(t) {
        return t * t * t * t;
    }
    // decelerating to zero velocity 
    function easeOutQuart(t) {
        return 1 - (--t) * t * t * t;
    }
    // acceleration until halfway, then deceleration
    function easeInOutQuart(t) {
        return t < .5 ? 8 * t * t * t * t : 1 - 8 * (--t) * t * t * t;
    }
    // accelerating from zero velocity
    function easeInQuint(t) {
        return t * t * t * t * t;
    }
    // decelerating to zero velocity
    function easeOutQuint(t) {
        return 1 + (--t) * t * t * t * t;
    }
    // acceleration until halfway, then deceleration 
    function easeInOutQuint(t) {
        return t < .5 ? 16 * t * t * t * t * t : 1 + 16 * (--t) * t * t * t * t;
    }

    //Event Handlers
    window.addEventListener("resize", onWindowResize);


    init();
    animate();

}

ThreeJSCanvas(1);
</script>