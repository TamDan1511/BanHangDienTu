<template>
<div>
    <div class="body-wrapper">
        <div class="col-lg-3">
            <div class="login-form">
                <div class="form-header">
                    <h2>Welcome to Electro.</h2>
                    <p>Fill out the form to get started.</p>
                </div>

                <form action="">
                    <div class="form-group">
                        <input type="email" class="form-control" id="" placeholder="Email">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="" placeholder="Password">
                        <i class="fa fa-lock"></i>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="" placeholder="Confirm Password">
                        <i class="fa fa-key"></i>
                    </div>

                    <button type="submit" class="btn btn-warning">Get Started</button>
                    <div class="other-form">
                        <a href="#">Login?</a>
                    </div>
                </form>
 
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: 'LoginItem',
    data() {
        return {}
    },

}
</script>

<style lang="scss" scoped>
a:hover {
    text-decoration: none;
}

.body-wrapper {
    width: 100vw;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.login-form {
    padding: 50px 30px;
    border: 1px solid transparent;
    border-radius: 10px;
    box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
}

/* start form-header */
.form-header {
    text-align: center;
}

.form-header p {
    color: #747474;
}

.form-header h2 {
    color: #2c3e50;
}

/* start form-main */
.form-group input {
    border-radius: 10px;
    padding-left: 40px;
}

.form-group {
    position: relative;
}

.form-group i {
    position: absolute;
    top: 0px;
    left: 5px;
    padding: 10px;
}

.forgot-pass {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 20px;
    font-size: 15px;
}

.login-form button {
    width: 100%;
    border-radius: 10px;
    color: #fff;
    padding: 10px;
    transition: .5s;
}

.login-form button:hover {
    color: #fff;
    background-color: #f39c12;
}

.login-form .other-form {
    margin-top: 10px;
    display: flex;
    justify-content: center;
    font-size: 15px;
}

/* start form-footer */
.form-footer {
    margin-top: 20px;
}

.form-footer>div:first-child {
    display: flex;
    justify-content: center;
}

.form-footer>div:first-child span {
    position: relative;
    color: #8c98a4;
    margin: 0 5px;
}

.form-footer>div:first-child span::after,
.form-footer>div:first-child span::before {
    width: 1.75rem;
    height: 0.05469rem;
    transform: translateY(-50%);
    position: absolute;
    top: 50%;
    content: "";
}

.form-footer>div:first-child span::before {
    right: 100%;
    background-image: linear-gradient(45deg, transparent 0%, #bdc5d1 100%);
    background-repeat: repeat-x;
}

.form-footer>div:first-child span::after {
    left: 100%;
    background-image: linear-gradient(45deg, #bdc5d1 0%, transparent 100%);
    background-repeat: repeat-x;
}

.form-footer .other-login {
    margin-top: 10px;
    display: flex;
    justify-content: space-around;
    align-items: center;
}

.form-footer .other-login a {
    color: #fff;
    padding: 10px 20px;
    border: 1px solid transparent;
    border-radius: 10px;
}

.form-footer .other-login i {
    color: #fff;
}

.form-footer .facebook-login {
    background-color: #0652DD;
    transition: .5s;
}

.form-footer .facebook-login:hover {
    background-color: #1e3799;
}

.form-footer .google-login {
    background-color: #e84118;
    transition: .5s;
}

.form-footer .google-login:hover {
    background-color: #c23616;
}
</style>
