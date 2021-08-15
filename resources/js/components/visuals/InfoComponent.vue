<template>
    <div>

<!--        <v-app style="height: 110px; display: 0;">-->
<!--            <v-container>-->
<!--                <v-row justify="center">-->
<!--                    <v-col cols="12" sm="4">-->
<!--                        <v-card-->
<!--                            class="text-center"-->
<!--                            outlined-->
<!--                            tile-->
<!--                        >-->
<!--                            <v-dialog-->
<!--                                v-model="dialog"-->
<!--                                fullscreen-->
<!--                                hide-overlay-->
<!--                                transition="dialog-bottom-transition"-->
<!--                            >-->
<!--                                <template v-slot:activator="{ on, attrs }">-->
<!--                                    <div class="text-center" v-bind="attrs" v-on="on">-->
<!--                                        <v-btn-->
<!--                                            class="ma-2"-->
<!--                                            outlined-->
<!--                                            large-->
<!--                                            fab-->
<!--                                            color="teal"-->
<!--                                        >-->
<!--                                            <v-icon>mdi-truck-delivery</v-icon>-->
<!--                                        </v-btn>-->
<!--                                    </div>-->
<!--                                </template>-->
<!--                                <v-card>-->
<!--                                    <v-toolbar dark color="tile">-->
<!--                                        <v-btn-->
<!--                                            icon-->
<!--                                            dark-->
<!--                                            @click="dialog = false"-->
<!--                                        >-->
<!--                                            <v-icon>mdi-close</v-icon>-->
<!--                                        </v-btn>-->
<!--                                        <v-toolbar-title tile>Help & Customer Service</v-toolbar-title>-->
<!--                                    </v-toolbar>-->
<!--                                    <v-list-->
<!--                                        three-line-->
<!--                                        subheader-->
<!--                                    >-->
<!--                                        <v-subheader>User Controls</v-subheader>-->
<!--                                        <v-list-item>-->
<!--                                            <v-list-item-content>-->
<!--                                                <v-list-item-title>Tracking Your Order</v-list-item-title>-->
<!--                                                <v-list-item-subtitle>You can track your Amazon Logistics order in Your-->
<!--                                                    Orders. If you need more detailed help with tracking your package,-->
<!--                                                    please visit Track Your Package.-->
<!--                                                </v-list-item-subtitle>-->
<!--                                            </v-list-item-content>-->
<!--                                        </v-list-item>-->
<!--                                        <v-list-item>-->
<!--                                            <v-list-item-content>-->
<!--                                                <v-list-item-title>Delivery Information</v-list-item-title>-->
<!--                                                <v-list-item-subtitle>If no one is at the address when delivery is-->
<!--                                                    attempted, we will leave the package in a secure location. If no-->
<!--                                                    secure location is available, or the delivery requires someone to be-->
<!--                                                    present, Amazon Logistics will send an e-mail to the e-mail address-->
<!--                                                    on file. We'll make three delivery attempts on consecutive days. If-->
<!--                                                    the third delivery attempt is unsuccessful your package will be-->
<!--                                                    returned to Amazon for a refund.-->
<!--                                                </v-list-item-subtitle>-->
<!--                                            </v-list-item-content>-->
<!--                                        </v-list-item>-->
<!--                                    </v-list>-->
<!--                                    <v-divider></v-divider>-->
<!--                                    <v-list three-line subheader>-->
<!--                                        <v-subheader>General</v-subheader>-->
<!--                                        <v-list-item>-->
<!--                                            <v-list-item-content>-->
<!--                                                <v-list-item-title>Weekend Delivery Preference</v-list-item-title>-->
<!--                                                <v-list-item-subtitle>All orders received after 2pm on Fridays will be-->
<!--                                                    processed on Monday.-->
<!--                                                </v-list-item-subtitle>-->
<!--                                            </v-list-item-content>-->
<!--                                        </v-list-item>-->
<!--                                        <v-list-item>-->
<!--                                            <v-list-item-content>-->
<!--                                                <v-list-item-title>Customer Service</v-list-item-title>-->
<!--                                                <v-list-item-subtitle>Customer Service is available 24/7. You can-->
<!--                                                    contact us if you need to reschedule a delivery or with any other-->
<!--                                                    questions you may have.-->
<!--                                                </v-list-item-subtitle>-->
<!--                                            </v-list-item-content>-->
<!--                                        </v-list-item>-->
<!--                                    </v-list>-->
<!--                                </v-card>-->
<!--                            </v-dialog>-->
<!--                        </v-card>-->
<!--                    </v-col>-->

<!--                    <v-col-->
<!--                        cols="12"-->
<!--                        sm="4"-->
<!--                    >-->
<!--                        <v-card class="text-center" outlined tile>-->
<!--                            <v-dialog-->
<!--                                v-model="dialog"-->
<!--                                fullscreen-->
<!--                                hide-overlay-->
<!--                                transition="dialog-bottom-transition"-->
<!--                            >-->
<!--                                <template v-slot:activator="{ on, attrs }">-->
<!--                                    <v-btn-->
<!--                                        v-bind="attrs" v-on="on"-->
<!--                                        class="ma-2"-->
<!--                                        outlined-->
<!--                                        large-->
<!--                                        fab-->
<!--                                        color="teal"-->
<!--                                    >-->
<!--                                        <v-icon>mdi-information-outline</v-icon>-->
<!--                                    </v-btn>-->
<!--                                </template>-->
<!--                                <v-card>-->
<!--                                    <v-toolbar dark color="tile">-->
<!--                                        <v-btn-->
<!--                                            icon-->
<!--                                            dark-->
<!--                                            @click="dialog = false"-->
<!--                                        >-->
<!--                                            <v-icon>mdi-close</v-icon>-->
<!--                                        </v-btn>-->
<!--                                        <v-toolbar-title>Advice for customers</v-toolbar-title>-->
<!--                                    </v-toolbar>-->
<!--                                    <v-list three-line subheader>-->
<!--                                        <v-subheader>User Controls</v-subheader>-->
<!--                                        <v-list-item>-->
<!--                                            <v-list-item-content>-->
<!--                                                <v-list-item-title>Always place orders from a secure connection-->
<!--                                                </v-list-item-title>-->
<!--                                                <v-list-item-subtitle>If your computer isn’t protected from potentially-->
<!--                                                    malicious software, your financial information and passwords are at-->
<!--                                                    risk from being stolen (and everything else you store on your-->
<!--                                                    computer or do online). This concept is so basic, yet only a-->
<!--                                                    fraction of the U.S. population adequately protects their computers.-->
<!--                                                    Use a secure connection – make sure your computer’s firewall is on.-->
<!--                                                </v-list-item-subtitle>-->
<!--                                            </v-list-item-content>-->
<!--                                        </v-list-item>-->
<!--                                        <v-list-item>-->
<!--                                            <v-list-item-content>-->
<!--                                                <v-list-item-title>Coupon codes</v-list-item-title>-->
<!--                                                <v-list-item-subtitle>If you are buying a Gift Card, read the Terms and-->
<!--                                                    Conditions.-->
<!--                                                </v-list-item-subtitle>-->
<!--                                            </v-list-item-content>-->
<!--                                        </v-list-item>-->
<!--                                    </v-list>-->
<!--                                    <v-divider></v-divider>-->
<!--                                    <v-list-->
<!--                                        three-line-->
<!--                                        subheader-->
<!--                                    >-->
<!--                                        <v-subheader>General</v-subheader>-->
<!--                                        <v-list-item>-->
<!--                                            <v-list-item-content>-->
<!--                                                <v-list-item-title>Need to create a password for the site? – make it-->
<!--                                                    unique.-->
<!--                                                </v-list-item-title>-->
<!--                                                <v-list-item-subtitle>You will often be asked to create an account with-->
<!--                                                    a password when you make a purchase. Usually, you can choose not to-->
<!--                                                    do this, and unless you will use the e-store frequently, don’t-->
<!--                                                    create an account. If you do want an account, make sure to use a-->
<!--                                                    unique and strong password.-->
<!--                                                </v-list-item-subtitle>-->
<!--                                            </v-list-item-content>-->
<!--                                        </v-list-item>-->
<!--                                        <v-list-item>-->
<!--                                            <v-list-item-content>-->
<!--                                                <v-list-item-title>Use a reliable internet security program.-->
<!--                                                </v-list-item-title>-->
<!--                                                <v-list-item-subtitle>The best way to stay safe online is still by using-->
<!--                                                    an effective internet security product. Shopping is no exception.-->
<!--                                                    Rather, with the increasing volume of goods and data being exchanged-->
<!--                                                    online, security features like real-time anti-phishing and identity-->
<!--                                                    theft protection are more important than ever.-->
<!--                                                </v-list-item-subtitle>-->
<!--                                            </v-list-item-content>-->
<!--                                        </v-list-item>-->
<!--                                        <v-list-item>-->
<!--                                            <v-list-item-content>-->
<!--                                                <v-list-item-title>Is the site secure?</v-list-item-title>-->
<!--                                                <v-list-item-subtitle>Before entering any personal or credit card info-->
<!--                                                    onto a shopping site look to see if the web address on the page-->
<!--                                                    begins with "https:", not "http:" That little ’s’ tells you the-->
<!--                                                    website is secure and encrypted to protect your information.-->
<!--                                                </v-list-item-subtitle>-->
<!--                                            </v-list-item-content>-->
<!--                                        </v-list-item>-->
<!--                                    </v-list>-->
<!--                                </v-card>-->
<!--                            </v-dialog>-->
<!--                        </v-card>-->
<!--                    </v-col>-->

<!--                    <v-col-->
<!--                        cols="12"-->
<!--                        sm="4"-->
<!--                    >-->
<!--                        <v-card-->
<!--                            class="text-center"-->
<!--                            outlined-->
<!--                            tile-->
<!--                        >-->
<!--                            <v-dialog-->
<!--                                v-model="dialog"-->
<!--                                fullscreen-->
<!--                                hide-overlay-->
<!--                                transition="dialog-bottom-transition"-->
<!--                            >-->
<!--                                <template v-slot:activator="{ on, attrs }">-->
<!--                                    <v-btn-->
<!--                                        v-bind="attrs" v-on="on"-->
<!--                                        class="ma-2"-->
<!--                                        outlined-->
<!--                                        large-->
<!--                                        fab-->
<!--                                        color="teal"-->
<!--                                    >-->
<!--                                        <v-icon>mdi-information-outline</v-icon>-->
<!--                                    </v-btn>-->
<!--                                </template>-->
<!--                                <v-card>-->
<!--                                    <v-toolbar dark>-->
<!--                                        <v-btn-->
<!--                                            icon-->
<!--                                            dark-->
<!--                                            @click="dialog = false"-->
<!--                                        >-->
<!--                                            <v-icon>mdi-close</v-icon>-->
<!--                                        </v-btn>-->
<!--                                        <v-toolbar-title>Advice for customers</v-toolbar-title>-->
<!--                                    </v-toolbar>-->
<!--                                    <v-list-->
<!--                                        three-line-->
<!--                                        subheader-->
<!--                                    >-->
<!--                                        <v-subheader>User Controls</v-subheader>-->
<!--                                        <v-list-item>-->
<!--                                            <v-list-item-content>-->
<!--                                                <v-list-item-title>Always place orders from a secure connection-->
<!--                                                </v-list-item-title>-->
<!--                                                <v-list-item-subtitle>If your computer isn’t protected from potentially-->
<!--                                                    malicious software, your financial information and passwords are at-->
<!--                                                    risk from being stolen (and everything else you store on your-->
<!--                                                    computer or do online). This concept is so basic, yet only a-->
<!--                                                    fraction of the U.S. population adequately protects their computers.-->
<!--                                                    Use a secure connection – make sure your computer’s firewall is on.-->
<!--                                                </v-list-item-subtitle>-->
<!--                                            </v-list-item-content>-->
<!--                                        </v-list-item>-->
<!--                                        <v-list-item>-->
<!--                                            <v-list-item-content>-->
<!--                                                <v-list-item-title>Coupon codes</v-list-item-title>-->
<!--                                                <v-list-item-subtitle>If you are buying a Gift Card, read the Terms and-->
<!--                                                    Conditions.-->
<!--                                                </v-list-item-subtitle>-->
<!--                                            </v-list-item-content>-->
<!--                                        </v-list-item>-->
<!--                                    </v-list>-->
<!--                                    <v-divider></v-divider>-->
<!--                                    <v-list-->
<!--                                        three-line-->
<!--                                        subheader-->
<!--                                    >-->
<!--                                        <v-subheader>General</v-subheader>-->
<!--                                        <v-list-item>-->
<!--                                            <v-list-item-content>-->
<!--                                                <v-list-item-title>Need to create a password for the site? – make it-->
<!--                                                    unique.-->
<!--                                                </v-list-item-title>-->
<!--                                                <v-list-item-subtitle>You will often be asked to create an account with-->
<!--                                                    a password when you make a purchase. Usually, you can choose not to-->
<!--                                                    do this, and unless you will use the e-store frequently, don’t-->
<!--                                                    create an account. If you do want an account, make sure to use a-->
<!--                                                    unique and strong password.-->
<!--                                                </v-list-item-subtitle>-->
<!--                                            </v-list-item-content>-->
<!--                                        </v-list-item>-->
<!--                                        <v-list-item>-->
<!--                                            <v-list-item-content>-->
<!--                                                <v-list-item-title>Use a reliable internet security program.-->
<!--                                                </v-list-item-title>-->
<!--                                                <v-list-item-subtitle>The best way to stay safe online is still by using-->
<!--                                                    an effective internet security product. Shopping is no exception.-->
<!--                                                    Rather, with the increasing volume of goods and data being exchanged-->
<!--                                                    online, security features like real-time anti-phishing and identity-->
<!--                                                    theft protection are more important than ever.-->
<!--                                                </v-list-item-subtitle>-->
<!--                                            </v-list-item-content>-->
<!--                                        </v-list-item>-->
<!--                                        <v-list-item>-->
<!--                                            <v-list-item-content>-->
<!--                                                <v-list-item-title>Is the site secure?</v-list-item-title>-->
<!--                                                <v-list-item-subtitle>Before entering any personal or credit card info-->
<!--                                                    onto a shopping site look to see if the web address on the page-->
<!--                                                    begins with "https:", not "http:" That little ’s’ tells you the-->
<!--                                                    website is secure and encrypted to protect your information.-->
<!--                                                </v-list-item-subtitle>-->
<!--                                            </v-list-item-content>-->
<!--                                        </v-list-item>-->
<!--                                    </v-list>-->
<!--                                </v-card>-->
<!--                            </v-dialog>-->
<!--                        </v-card>-->
<!--                    </v-col>-->
<!--                    -->
<!--                    -->
<!--                    -->
<!--                    -->
<!--                    -->
<!--                    -->
<!--                    -->
<!--                    -->
<!--                    -->
<!--                    -->
<!--                    -->
<!--                </v-row>-->
<!--            </v-container>-->
<!--        </v-app>-->
    </div>
</template>

<script>
    export default {
        name: 'info-component',
        data: function () {
            return {
                dialog: false,
                notifications: false,
                sound: true,
                widgets: false,
            }
        },
    }
</script>

<style>
    .card-outter {
        position: relative;
    }

    .card-actions {
        position: absolute;
        bottom: 0;
    }

</style>
