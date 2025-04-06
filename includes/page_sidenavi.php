<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="javascript:;" class="site_title"><img src="../assets/images/nsqcs-logo.png" width="44" height="44"> <span style="font-size: 12pt;">BPI-NSQCS PMC</span></a>
        </div>

        <div class="clearfix"></div>

        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="../assets/images/user.png" alt="..." class="img-circle profile_img">
            </div>
            
            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $user->data()->FirstName ?> <?php echo $user->data()->LastName ?></h2>
<!--                <h2>Region <?php echo $user->data()->RegionSrcID ?></h2>-->
            </div>
        </div>

        <br />

        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            
            <div class="menu_section">
                <h3>General</h3>
                <?php if($user->data()->AcntLvl == 0 && $user->data()->UserType == 0) { ?>
                <ul class="nav side-menu">

                    <li><a href="../dashboard/dashboard.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','Dashboard') ?>"><i class="fa fa-laptop"></i> Dashboard </a></li>
<!--
                    <li>
                    <a href="../dashboard/dashboard-mother-trees-application.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','dashboard-mother-trees') ?>"><i class="fa fa-tree"></i> Mother Tree Certification</a>
                    </li>
-->
                    <li>
                    <a><i class="fa fa-home"></i> Nursery Accreditation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="../pages/plant-nursery-accreditation.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','dashboard-nursery-accreditation.php') ?>">Accreditation</a></li>
                        <li><a href="../pages/plant-nursery-accreditation-application.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','dashboard-nursery-accreditation.php') ?>">Accreditation Application</a></li>
                        <li><a href="../pages/plant-nursery-accreditation-application-approval.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','dashboard-nursery-accreditation.php') ?>">Accreditation Application Approval</a></li>
                    </ul>
                    </li>
<!--
                    <li>
                    <a><i class="fa fa-leaf"></i> Seedlings Certification <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="../dashboard/asexually-propagated-dashboard.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','asexually-propagated-dashboard') ?>">Asexually Propagated</a></li>
                        <li><a href="../dashboard/sexually-propagated-dashboard.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','sexually-propagated-dashboard') ?>">Sexually Propagated</a></li>
                    </ul>
                    </li>
-->
                    <?php if($user->data()->UserType == 0) { ?>
                    <li>
                    <a><i class="fa fa-cubes"></i> Manage <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
<!--                        <li><a onclick="window.location.href='../pages/manage/pno-profile-list.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','pno-profile-list') ?>'">PNO Profile</a></li>-->
                        <li><a href="../pages/pno-profile-list.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','pno-profile-list') ?>">PNO/Representative Profile</a></li>
                        <li><a href="../pages/pmc-nursery-list?nv=<?php echo $gen->encrypt_decrypt('encrypt','pmc-nursery-list') ?>">Nursery Profile</a></li>
                    </ul>
                    </li>
                    <li>
                    <a><i class="fa fa-cog"></i> Settings <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
<!--                        <li><a onclick="window.location.href='../pages/manage/pno-profile-list.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','pno-profile-list') ?>'">PNO Profile</a></li>-->
                        <li><a href="../pages/pmc-crops-list.php">Crops</a></li>
                        <li><a href="../pages/pmc-variety-list.php">Variety</a></li>
                        <li><a href="../pages/pmc-scion-cycle.php">Scion Cycle</a></li>
                        <li><a href="../pages/pmc-grouptype-list.php">Group Management</a></li>
                    </ul>
                    </li>
                    
                    <?php } ?>
                </ul>
                <?php } elseif($user->data()->AcntLvl == 1 && $user->data()->UserType == 9) {  ?>
                
                <ul class="nav side-menu">
                    <li><a href="../dashboard/dashboard.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','Dashboard') ?>"><i class="fa fa-laptop"></i> Dashboard </a></li>
                    <li>
                    <a><i class="fa fa-home"></i> Nursery Accreditation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="../pages/plant-nursery-accreditation.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','dashboard-nursery-accreditation.php') ?>">Accreditation</a></li>
<!--                        <li><a href="../pages/plant-nursery-accreditation-application.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','dashboard-nursery-accreditation.php') ?>">Accreditation Application</a></li>-->
                        <li><a href="../pages/pmc-accreditation-application-unithead-approval.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','dashboard-nursery-accreditation.php') ?>">Accreditation Application Approval</a></li>
                    </ul>
                    </li>
                </ul>
                
                <?php } elseif($user->data()->AcntLvl == 2 && $user->data()->UserType == 2) {  ?>
                
                <ul class="nav side-menu">
                    <li><a href="../dashboard/dashboard.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','Dashboard') ?>"><i class="fa fa-laptop"></i> Dashboard </a></li>
                    <li>
                    <li>
                    <a><i class="fa fa-home"></i> Nursery Accreditation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="../pages/plant-nursery-accreditation.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','dashboard-nursery-accreditation.php') ?>">Accreditation</a></li>
                        <li><a href="../pages/plant-nursery-accreditation-application.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','dashboard-nursery-accreditation.php') ?>">Accreditation Application</a></li>
                    </ul>
                    </li>
<!--
                    <li>
                    <a><i class="fa fa-book"></i> Certification Approval <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="../dashboard/dashboard-mother-trees-application-approval.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','dashboard-mother-trees-application-approval') ?>">Mother Tree</a></li>
                        <li><a href="../dashboard/dashboard-nursery-geotagging.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','dashboard-nursery-geotagging') ?>">Nursery Geotagging</a></li>
                        <li><a href="../dashboard/dashboard-mt-geotagging.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','dashboard-mt-geotagging') ?>">Mother Tree Geotagging</a></li>  
                    </ul>
                    </li>
-->
                </ul>
                
                <?php } elseif($user->data()->AcntLvl == 1 && $user->data()->UserType == 5) { ?>
                 <ul class="nav side-menu">
                    <li><a href="../dashboard/dashboard.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','Dashboard') ?>"><i class="fa fa-laptop"></i> Dashboard </a></li>
                    <li>
                    <li>
                    <a><i class="fa fa-home"></i> Nursery Accreditation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="../pages/plant-nursery-accreditation.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','dashboard-nursery-accreditation.php') ?>">Accreditation</a></li>
                        <li><a href="../pages/pmc-accreditation-application-chief-approval.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','pmc-accreditation-application-chief-approval.php') ?>">Accreditation Application Approval</a></li>
                    </ul>
                    </li>
                </ul>
                <?php } elseif($user->data()->AcntLvl == 0 && $user->data()->UserType == 8) { ?>
                 <ul class="nav side-menu">
                    <li><a href="../dashboard/dashboard.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','Dashboard') ?>"><i class="fa fa-laptop"></i> Dashboard </a></li>
                    <li>
                        
                    <li>
                    <a><i class="fa fa-home"></i> Nursery Accreditation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="../pages/plant-nursery-accreditation.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','dashboard-nursery-accreditation.php') ?>">Accreditation</a></li>
                        <li><a href="../pages/pmc-accreditation-application-director-approval.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','pmc-accreditation-application-director-approval.php') ?>">Accreditation Application Approval</a></li>
                    </ul>
                    </li>

                </ul>
                <?php } elseif ($user->data()->AcntLvl == 2 && $user->data()->UserType == 11) { ?>
                 <ul class="nav side-menu">
                    <li><a href="../dashboard/dashboard.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','Dashboard') ?>"><i class="fa fa-laptop"></i> Dashboard </a></li>
                    <li>
                        
                    <li>
                    <a><i class="fa fa-home"></i> Nursery Accreditation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="../pages/plant-nursery-accreditation.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','dashboard-nursery-accreditation.php') ?>">Accreditation</a></li>
                        <li><a href="../pages/pmc-accreditation-application-director-approval.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','pmc-accreditation-application-director-approval.php') ?>">Accreditation Application Approval</a></li>
                    </ul>
                    </li>

                </ul>
                <?php } else { ?>
                
                    <ul class="nav side-menu">
                    <li><a href="../dashboard/dashboard.php?nv=<?php echo $gen->encrypt_decrypt('encrypt','Dashboard') ?>"><i class="fa fa-laptop"></i> Dashboard </a></li>
                    <li>

                </ul>
                
                <?php } ?>
            </div>
            
        </div>
          
    </div>
</div>