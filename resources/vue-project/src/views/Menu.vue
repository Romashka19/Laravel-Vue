<template>
    <div class="menu-container">
        <div class="container">
            <div class="content-space">
                <div class="info-block">
                    <div class="info-title wrapper">
                        <h2>Restaurant menu</h2>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                    <div class="adress-info">
                        <p class="title-col">RESERVATION</p>
                        <p>Phone: +7 (495) 000-00-00</p>
                        <p>Email: info@mysite.ru</p>
                        <div class="under-line"></div>
                        <p class="title-col">OPENING HOURS</p>
                        <p>Monday - Sunday</p>
                        <p>10:00 to the last customer</p>
                    </div>
                </div>
                <div class="main-content-block">
                    <div class="menu">
                        <div class="menu-list">
                            <div class="select-food">
                                <button class="select">Salads</button>
                                <button class="select">Hot meals</button>
                                <button class="select">Snacks</button>
                                <button class="select">Beverages</button>
                            </div>
                            <div class="under-line"></div>
                            <div class="menu-content">
                                <p class="title-food">Hot meals</p>
                                <div class="under-line"></div>
                                <div :key="food.value" v-for="food in MenuData">
                                    <div class="dish-name">
                                        <div class="name-price">
                                            <p class="name">{{ food.name }}</p>
                                            <p class="price">{{ food.price }}$</p>
                                        </div>
                                        <div class="about">
                                            <p class="discription">{{ food.discription }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

    export default {
        name: 'Menu',
        data(){
            return {
                MenuData : [],
            }
        },
        components: {
        },
        mounted() {
            this.$axios({
                method: 'GET',
                url: 'http://restoran.test/api/menu',
            }).then(response => {
                let meals = this.MenuData;
                for (let i = 0;i<response.data.length;i++){
                    if(response.data[i].relate_food == 'menu'){
                        meals.push(response.data[i]);
                    }
                }
            })
        },
        created() {

        },
        methods: {

        },
    }
</script>
