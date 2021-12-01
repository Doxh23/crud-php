const login = document.querySelector('.login')
const register = document.querySelector('.register')

document.getElementById('login-title').addEventListener('click',function(){
    login.style.display = "flex"
    register.style.display = "none"

})
document.getElementById('register-title').addEventListener('click',function(){
    register.style.display = "flex"
    login.style.display = "none"

})
