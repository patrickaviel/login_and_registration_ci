<?php $this->load->view('partials/welcome_header.php')?>
 
    <div class="main-container">
        <h1>Welcome! <?=$this->session->userdata('first_name')?></h1>
        <div class="info">
            <p>First Name: <?=$this->session->userdata('first_name')?></p>
            <p>Last Name: <?=$this->session->userdata('last_name')?></p>
            <p>Email: <?=$this->session->userdata('email')?></p>
        </div>
    </div>

<?php $this->load->view('partials/welcome_footer.php')?>