<?php
/**
 * Created by PhpStorm.
 * User: Wellison
 * Date: 01/03/2018
 * Time: 21:55
 */
?>
<body>
<header style="position: fixed;width: 100%;top: 0; z-index: 1000">
    <div class="pos-f-t">

        <nav class="navbar navbar-dark" style="background-color: #FF5D00">
            <div class="row">
                &ensp;
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>&ensp;
                <a class="navbar-brand" href="#">
                    <img src="<?php APPPATH ?>imgs\logobrand.png" height="30" class="d-inline-block align-left">
                </a>
            </div>
        </nav>
    </div>

</header>
<div class="collapse" id="navbarToggleExternalContent"
     style="position: fixed; width: 15%; height: 100%;top: 6.7%; z-index: 1000">
    <div class="p-4" style="background-color: #FF5D00;">
        <h4 class="text-white">Collapsed content</h4>
        <span class="text-muted">Toggleable via the navbar brand.</span>
    </div>

</div>