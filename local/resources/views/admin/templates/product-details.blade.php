<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="/sohil/assets/admin/style.css">
        <style>
            #name{
                line-height: 150px;
            }
            #headshot{
                width: 150px;
            }
            img.img-thumbnail{
                height: 150px;
            }
            .sectionTitle{
                font-size: 12px;
                width: 40%;
            }
            .sectionContent{
                width: 58%;
            }
            .sectionContent .prices-list{
                display: none;
                direction: ltr;       
            }
            .sectionContent .prices-list ul{
                list-style: none;        
            }
            .sectionContent .prices-list ul{
                font-size: 16px;
                font-family: sans-serif;
            }
            
            .sectionContent .prices-list ul .price-val ,.sectionContent .prices-list ul .price-date{
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>

        <div id="profile" class="instaFade" >
            <div class="mainDetails"> 
                <div id="headshot" class="quickFade thumbnail" >
                    <img  class="img-thumbnail img-responsive" src="{image}" alt="{name}" />
                </div>

                <div id="name" >
                    <h1 class="quickFade delayTwo">{name}</h1>

                </div>

                <div class="clear"></div>
            </div>

            <div id="mainArea" class="quickFade delayFive">
                <section>
                    <article>
                        <div class="sectionTitle">
                            <h1>الكود</h1>
                        </div>

                        <div class="sectionContent">
                            <p>{code}</p>
                        </div>
                        <div class="clear"></div>
                    </article>
                </section>
                <section>
                    <article>
                        <div class="sectionTitle">
                            <h1>نقاط المبيعات</h1>
                        </div>

                        <div class="sectionContent">
                            <p>{points}</p>
                        </div>
                    </article>
                    <div class="clear"></div>
                </section>
                <section>
                    <article>
                        <div class="sectionTitle">
                            <h1>نقاط مرتجع</h1>
                        </div>

                        <div class="sectionContent">
                            <p>{dmg_points}</p>
                        </div>
                    </article>
                    <div class="clear"></div>
                </section>

                <section>
                    <article>
                        <div class="sectionTitle">
                            <h1>سعر الشراء</h1>
                        </div>

                        <div class="sectionContent">
                            <p>{b_price}</p>
                            <div class="prices-list">
                                <ul>{old_prices}</ul>
                            </div>
                        </div>
                    </article>
                    <div class="clear"></div>
                    <button type="button" class="btn-old-prices btn btn default"><li class="fa fa-list"></li> جميع الاسعار السابقه</button>
                </section>
                <section>
                    <article>
                        <div class="sectionTitle">
                            <h1>سعر البيع</h1>
                        </div>

                        <div class="sectionContent">
                            <p>{s_price}</p>
                        </div>
                    </article>
                    <div class="clear"></div>
                </section>

                <section>
                    <article>
                        <div class="sectionTitle">
                            <h1>عدد الكراتين</h1>
                        </div>

                        <div class="sectionContent">
                            <p>{box_count}</p>
                        </div>
                    </article>
                    <div class="clear"></div>
                </section>
                <section>
                    <article>
                        <div class="sectionTitle">
                            <h1>عدد القطع داخل كل كرتونه</h1>
                        </div>

                        <div class="sectionContent">
                            <p>{box_items_count}</p>
                        </div>
                    </article>
                    <div class="clear"></div>
                </section>
                <section>
                    <article>
                        <div class="sectionTitle">
                            <h1>اجمالي عدد القطع</h1>
                        </div>

                        <div class="sectionContent">
                            <p>{box_total}</p>
                        </div>
                    </article>
                    <div class="clear"></div>
                </section>
                <section>
                    <article>
                        <div class="sectionTitle">
                            <h1>الوصف</h1>
                        </div>

                        <div class="sectionContent">
                            <p>{desc}</p>
                        </div>
                    </article>
                    <div class="clear"></div>
                </section>

                <section>
                    <article>
                        <div class="sectionTitle">
                            <h1>اجمالي النقاط</h1>
                        </div>

                        <div class="sectionContent">
                            <p>{numberpoint}</p>
                        </div>
                    </article>
                    <div class="clear"></div>
                </section>

                <section>
                    <article>
                        <div class="sectionTitle">
                            <h1>الشركه</h1>
                        </div>

                        <div class="sectionContent">
                            <p>{company}</p>
                        </div>
                    </article>
                    <div class="clear"></div>
                </section>
                <section>
                    <article>
                        <div class="sectionTitle">
                            <h1>الصنف الرئيسي</h1>
                        </div>

                        <div class="sectionContent">
                            <p>{cat}</p>
                        </div>
                    </article>
                    <div class="clear"></div>
                </section>
                <section>
                    <article>
                        <div class="sectionTitle">
                            <h1>الصنف الفرعي</h1>
                        </div>

                        <div class="sectionContent">
                            <p>{sub_cat}</p>
                        </div>
                    </article>
                    <div class="clear"></div>
                </section>

                <section>
                    <article>
                        <div class="sectionTitle">
                            <h1>المخزن</h1>
                        </div>

                        <div class="sectionContent">
                            <p>{store_id}</p>
                        </div>
                    </article>
                    <div class="clear"></div>
                </section>
                <section>
                    <article>
                        <div class="sectionTitle">
                            <h1>تاريخ الاضافه</h1>
                        </div>

                        <div class="sectionContent">
                            <p>{created_at}</p>
                        </div>
                    </article>
                    <div class="clear"></div>
                </section>
                <section>
                    <article>
                        <div class="sectionTitle">
                            <h1>تاريخ اخر تعديل</h1>
                        </div>

                        <div class="sectionContent">
                            <p>{updated_at}</p>
                        </div>
                    </article>
                    <div class="clear"></div>
                </section>
            </div>
        </div>
    </body>
</html>