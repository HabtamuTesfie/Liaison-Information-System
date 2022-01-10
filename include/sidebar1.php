<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$('#nav > li > ul').hide();

// show/hide sub menu if it exists
$('#nav > li > a').click(function () {
    var $ul = $(this).siblings('ul');
    if ($ul.length > 0) {
        $ul.toggle();
        return false;
    }
});
</script>

<div class="sidebar app-aside" id="sidebar">
				<div class="sidebar-container perfect-scrollbar">

<nav>
						
						<!-- start: MAIN NAVIGATION MENU -->
						<div class="navbar-title">
							<span>Main Navigation</span>
						</div>
						<ul class="main-navigation-menu">
							<li>
								<a href="dashboard.php">
									<div class="item-content">
										<div class="item-media">
										<i class="fa fa-dashboard" style="font-size:24px"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Dashboard </span>
										</div>
									</div>
								</a>
							</li>
							
							
								<li>
								<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<i class="fa fa-user" style="font-size:24px"></i>
										</div>
										<div class="item-inner">
											<span class="title"> <b>Patients</b> </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								<ul class="sub-menu" id="nav">
									<li>
										<a href="add-patient.php">
											<span class="title"><b>Add patient</b></span>
										</a>
									</li>
									<li>
										<a href="patients.php">
											<span class="title"><b>View patient data</b></span>
										</a>
									</li>
									
								</ul>
								</li>
								
								
								<li>
								<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<i class="fa fa-user" style="font-size:24px"></i>
										</div>
										<div class="item-inner">
											<span class="title"><b>Admission</b></span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="add-admission.php">
											<span class="title"><b>Admitt new patient</b></span>
										</a>
									</li>
									<li>
										<a href="admission.php">
											<span class="title"><b>View admitted patient</b></span>
										</a>
									</li>
									
								</ul>
								</li>
								
								
								<li>
								<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<i class="fa fa-user" style="font-size:24px"></i>
										</div>
										<div class="item-inner">
											<span class="title"><b> Discharge</b> </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="Discharge.php">
											<span class="title"><b> Discharge patient</b></span>
										</a>
									</li>
									<li>
										<a href="view discharge.php">
											<span class="title"><b>View Discharge</b></span>
										</a>
									</li>
									
								</ul>
								</li>
								
								
								<li>
								<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<i class="fa fa-arrow-right" style="font-size:24px"></i>
										</div>
										<div class="item-inner">
											<span class="title"><b> Referral-IN</b> </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="Referral_IN.php">
											<span class="title"><b>Add new referral-IN</b></span>
										</a>
									</li>
									<li>
										<a href="view referralin.php">
											<span class="title"><b>View referral-IN</b></span>
										</a>
									</li>
									
								</ul>
								</li>
								
								
								<li>
								<a href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<i class="fa fa-arrow-left" style="font-size:24px"></i>
										</div>
										<div class="item-inner">
											<span class="title"><b> Referral-OUT</b> </span><i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								<ul class="sub-menu">
									<li>
										<a href="referralOut.php">
											<span class="title"><b>Add new Referral-OUT</b> </span>
										</a>
									</li>
									<li>
										<a href="view referralout.php">
											<span class="title"><b>View Referral-OUT</b> </span>
										</a>
									</li>
									
								</ul>
								</li>
								
								
								<li>
								<a href="beds.php">
									<div class="item-content">
										<div class="item-media">
											 <i class="fa fa-bed fa-2x" aria-hidden="true"></i>
										</div>
										<div class="item-inner">
											<span class="title"><b>Bed Management</b></span>
										</div>
									</div>
								</a>
							</li>
							
							<li>
								<a href="view ambulance.php">
									<div class="item-content">
										<div class="item-media">
											<i class="fa fa-ambulance fa-2x" aria-hidden="true"></i>
										</div>
										<div class="item-inner">
											<span class="title"><b>Ambulance Management</b></span>
										</div>
									</div>
								</a>
							</li>
							
							 <li>
								<a href="viewappointmentoficer.php">
									<div class="item-content">
										<div class="item-media">
											<i class="fa fa-calendar" aria-hidden="true" style='font-size:24px'></i>
										</div>
										<div class="item-inner">
											<span class="title"><b>Appointment</b></span>
										</div>
									</div>
								</a>
							</li>
							<br><br>
						<li>
            <a href="#">
               <div class="item-content">
				<div class="item-media">			
			<div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
							</div>
							</div>
						  </a>
						</li>
						</ul>
						<!-- end: CORE FEATURES -->
						
					</nav>
					</div>
			</div>
