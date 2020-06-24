<template>
    <div>
        <header>
            <div class="header-restorant">
                <div class="container wrapper">
                    <div class="label-restorant wrapper"><a class="restorant-logo">Danyil K.
                        <div class="under-line"></div></a></div>
                    <div class="menu-restoran wrapper">
                        <ul class="menu-list wrapper">
                            <li><a><router-link to="/">HOME</router-link></a></li>
                            <li><a><router-link to="/restaurant">RESTAURANT</router-link></a></li>
                            <li><a><router-link to="/menu">MENU</router-link></a></li>
                            <li><a><router-link to="/online">ONLINE ORDER</router-link></a></li>
                            <li><a><router-link to="/command">COMMAND</router-link></a></li>
                        </ul>
                        <a><router-link to="/order"><img src="img/buy.png"/></router-link></a>
                    </div>
                </div>
            </div>
        </header>
        <section>
            <router-view></router-view>
        </section>
        <footer>
            <div class="footer-container">
                <div class="container">
                    <div class="footer-restorant">
                        <div class="footer-info wrapper">
                            <div class="under-line"></div>
                            <p class="address-rest">st. Arbat, 1a, Moscow</p>
                            <p class="address-rest">119019, Russia</p>
                            <div class="contact-links"><img src="img/vk.png"/><img src="img/fb.png"/><img src="img/inst.png"/><img src="img/sova.png"/></div>
                            <p class="more-info">© 2023 Restaurant Mafia</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>
