<html lang="en">
    <head>
    	@include('partials.dashmix._head')
    	@yield('style')
    </head>
    <body>
        <div id="page-container" class="enable-page-overlay {{config('dashmix.sidenav')}} {{config('dashmix.side-scroll')}} {{config('dashmix.header')}} {{config('dashmix.header-style')}} {{config('dashmix.main-content')}} {{config('dashmix.footer')}}">
            @include('partials.dashmix._sidenav')
            @include('partials.dashmix._nav')
            <main id="main-container" class="{{ !auth()->user()->hasRole('Super Admin') ? 'bg-primary-op' : ''}}">
            {{-- @include('partials.dashmix._breadcrumb') --}}
                <div class="content">
                	@yield('content')
                </div>
            </main>
            @include('partials.dashmix._footer')
        </div>
        @include('partials.dashmix._javascript')
        @include('partials.dashmix._helper')
        @yield('modal')
        @yield('scripts')
        @if(auth()->user()->hasRole('Customer') && auth()->user()->accepted_terms == 0)
        <div class="modal" id="terms-modal" tabindex="-1" role="dialog" aria-labelledby="terms-modal" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Tango Theaters Rewards Club Program</h3>
                        </div>
                        <div class="block-content">
                            <h3 class="content-heading">Terms and Conditions</h3>
                            <ol>
                                <li>
                                    These Terms and Conditions govern the relationship, rights and obligations between Tango Theatres and Members of the Tango Theatres Rewards Club ("Member" or "Members"). It is each Member's responsibility to carefully read and understand these Terms and Conditions as they include limitations and exclusions on the liability of Tango Theatres.
                                </li>
                                <li>
                                    By enrolling and participating in Tango Theatres Rewards Club (this “Rewards Club”), each Member acknowledges and agrees to these Terms and Conditions.
                                </li>
                                <li>
                                    Tango Theatres reserves the right at any time without notice to amend, alter, withdraw or terminate any feature of this Rewards Club. Membership and all related Rewards are offered at the sole discretion of Tango Theatres.
                                </li>
                                <li>
                                    All Rewards Cards remain the property of Tango Theatres at all times and must only be used by Members for the purposes contemplated by these Terms and Conditions.
                                </li>
                                <li>
                                    Tango Theatres shall have the exclusive right at any time to amend or revise these Terms and Conditions including, but not limited, to the program structure, benefits, points associated with redeemable items and all Members shall be bound by any amended or revised Terms and Conditions.  It is the responsibility of Members to keep themselves up to date in respect to this Rewards Club and these Terms and Conditions.
                                </li>
                                <li>
                                    This Rewards Club is free of charge and no form of payment, be it by cash or through credit card and digital currency, is required
                                </li>
                                <li>
                                    Membership in this Rewards Club (“Membership”) is open to individuals aged 16 years or over. Only one card per person is allowed.  Membership is accepted at the sole discretion of Tango Theatres.
                                </li>
                                <li>
                                    Membership is effective upon receipt of the email confirmation from Tango Theatres.
                                </li>
                                <li>
                                    The Member must only have one (1) Rewards Club account at any given time. A Member may accrue points and collect rewards in one (1) account only as provided below. Points earned may not be exchanged for cash and are subject to change.
                                </li>
                                <li>
                                    Membership can only be held by an individual. Membership is not available to corporations or other legal entities, families, groups, companies, trusts, partnerships, government departments or agencies.
                                </li>
                                <li>
                                    The Member may only earn points from purchases undertaken in a personal capacity. No points and/or reward can be earned by the Member from purchases undertaken on behalf of a business or as part of function, corporate screenings, fundraisers, group bookings, private screenings, screen hires, birthdays or school bookings.
                                </li>
                                <li>
                                    The Member cannot earn points and rewards from the purchase of Gift Vouchers, Corporate Passes, Booking Fee and other similar promotion and marketing programs of Tango Theatres unless specifically provided in the promotion or program.
                                </li>
                                <li>
                                    This Rewards Club’s point balances, rewards and other benefits are non-transferrable and are not redeemable for cash.
                                </li>
                                <li>
                                    Tango Theatres reserves the right at any time without notice to decline to issue Membership, withdraw or cancel any Membership, terminate a Membership or terminate this Rewards Club.
                                </li>
                                <li>
                                    The Member may terminate his/her Membership letting the Manager On-Duty know or by sending an email to www.tangotheatres.com/contact
                                </li>
                                <li>
                                    Membership will be automatically terminated if Tango Theatres cancels or terminates a Rewards Club membership.
                                </li>
                                <li>
                                    If a Tango Theatres Rewards Club Card (“Card”) is lost or stolen, the Member must immediately advise Tango Theatres either by email to www.tangotheatres.com/contact or by visiting the Tango Theatres box office (either at the Micronesia Mall or Agana Shopping Center).  The new card will be made available one week after the request for replacement has been received and may be picked up at the Micronesia Mall location after the Member pays the replacement card charge of $3.00.
                                </li>
                                <li>
                                    The Member shall apply for the Card at the Tango Theatres box office that will be free of charge. The Member may begin accruing points upon purchase at the Tango Theatres box office or concessions.
                                </li>
                                <li>
                                    In order to accrue points when purchasing tickets or food items, the Member must have his/her Card scanned at the Tango Theatres box office or the concessions or be logged on as a Member when purchasing tickets online.
                                </li>
                                <li>
                                    The Members can access their points balance and view benefits by logging into their account on the Tango Theatres Rewards Club Page.  The Member shall be responsible for the security of their passwords and Tango Theatres shall not be liable in the event that a Member’s password is disclosed, whether intentionally or not, so as to allow a third person access to the Member’s account to make transactions. 
                                </li>
                                <li>
                                    Tango Theatres reserves the right to audit a Member’s account without prior notice to ensure compliance with these Terms and Conditions.  During the course of the audit, Tango Theatres shall have the right to temporarily suspend, prohibit access or perform any transaction on the Member’s account.
                                </li>
                                <li>
                                    The Members agree that every use of the Tango Theatres Rewards Club account to accrue points and secure rewards signifies acceptance of these Terms and Conditions.
                                </li>
                            </ol>
                            <h3 class="content-heading">Earning Points and Rewards</h3>
                            <ol>
                                <li>
                                    Subject to these Terms and Conditions, Members will be eligible for a benefit when their Rewards Club account show that they have reached the required points balance.
                                </li>
                                <li>
                                    A Member will earn 1 point (which will be reflected in the Member’s Points Balance) for every $1.00 the Member spends on the purchase of movie tickets and food & drink items at Tango Theatres.
                                </li>
                                <li>
                                    Points are earned while a Member is logged on during an online transaction and by presenting the Member’s Card prior to the completion of a paid transaction at the Tango Theatres box office and concessions stand.
                                </li>
                                <li>
                                    It is the Member's responsibility to log in or show their Card to earn points. Tango Theatres shall not be liable in any manner whatsoever, for any loss or missed opportunity should a Member fail to log in for online transaction or show his/her Card while making a purchase.
                                </li>
                                <li>
                                    Only paid eligible purchases are eligible to earn points.
                                </li>
                                <li>
                                    When tickets/items are purchased online or at the box office and concessions of Tango Theatres, points will only be allocated to the Member who is making the full purchase, irrespective of the quantity of tickets/items purchased and whether other Members will be using the tickets/items.
                                </li>
                                <li>
                                    Points will not be earned, allocated or transferred for tickets or food items purchased directly in Tango Theatres prior to the effective date of this Rewards Club.
                                </li>
                                <li>
                                    Points earned will appear in the Member’s point balance within 24 hours of a completed eligible purchase or transaction.  Members may begin accruing points upon purchase at either the box office or concessions. Upon earning or redeeming points, the Member’s updated points balance will display within 24 hours.  Tango Theatres will not be liable to any Member due to any delay, omission, or failure in updating the Member’s point balance.
                                </li>
                                <li>
                                    If Tango Theatres cannot confirm that points, rewards or benefits were properly issued or obtained, it may refuse to record or honor the points, rewards or benefits on a Member's account, or if already recorded, may cancel such points or rewards.
                                </li>
                            </ol>
                            <h3 class="content-heading">Redeeming Rewards</h3>
                            <ol>
                                <li>
                                    The Member can redeem ticket-related benefits while logged into the Tango Theatres Rewards Club Card Member Page, or can redeem the applicable benefits onsite at Tango Theatres.box office by presenting his/her Card to the cashier.
                                </li>
                                <li>
                                    Members can choose to exchange their points for benefits as soon as they reach the minimum 40 points at their next visit to the Tango Theatres box office or may wish to save their points in order to redeem a higher value item.
                                </li>
                                <li>
                                    The redemption of a benefit is subject to item availability.
                                </li>
                                <li>
                                    No benefits shall be available for movie marathons, group bookings, corporate passes, special events or in conjunction with any other offer or promotion unless otherwise stated.
                                </li>
                                <li>
                                    Please see list of redemption points below:
                                    <h4 class="content-heading">Redemption Points:</h4>
                                    <table class="table table-bordered table-vcenter table-sm table-striped">
                                        <thead>
                                            <tr>
                                                <th class="font-w700">POINTS/CREDITS:</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Points/Credits for every $1 purchase</td>
                                                <td class="text-right">100</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered table-vcenter table-sm table-striped">
                                        <thead>
                                            <tr>
                                                <th class="font-w700">REWARDS:</th>
                                                <th class="text-right">POINTS/CREDITS NEEDED</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Small Popcorn</td>
                                                <td class="text-right">6,000</td>
                                            </tr>
                                            <tr>
                                                <td>Small Soda</td>
                                                <td class="text-right">5,000</td>
                                            </tr>
                                            <tr>
                                                <td>Free Movie</td>
                                                <td class="text-right">12,000</td>
                                            </tr>
                                            <tr>
                                                <td>Upgrade Soda to a larger(next) size</td>
                                                <td class="text-right">1,000</td>
                                            </tr>
                                            <tr>
                                                <td>Upgrade Popcorn to a larger(next) size</td>
                                                <td class="text-right">1,500</td>
                                            </tr>
                                            <tr>
                                                <td>Nachos</td>
                                                <td class="text-right" rowspan="3">1500</td>
                                            </tr>
                                            <tr>
                                                <td>Candies/Chips</td>
                                            </tr>
                                            <tr>
                                                <td>Premium Items (Movie Related)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </li>
                                <li>
                                    In the event that the Member returns or exchanges a purchased eligible product, any points the Member accrued when purchasing the eligible product will be deducted automatically from the Member’s points balance.
                                </li>
                                <li>
                                    Points earned may not be used in conjunction with on-going promotions.
                                </li>
                            </ol>
                            <h3 class="content-heading">Exclusion and Limitation of Liability</h3>
                            <ol>
                                <li>
                                    Tango Theatres, its owners, directors, officers, personnel, affiliates and marketing sponsors shall not be liable to any Member or Member’s companions for any indirect or consequential loss, damage or expense of any kind whatsoever arising out of or in connection with this Rewards Club program or the refusal to provide any points, rewards or benefits, whether such loss, damage or expense is caused by negligence or otherwise, and whether Tango Theatres has any control over the circumstances giving rise to the claim or not.
                                </li>
                                <li>
                                    Tango Theatres’ reserves the right to host special screenings that may include discounted price for Members.  Prior to admission for these special screenings, Members must present to Tango Theatres their Cards as proof of Membership.  As seating is limited, Member ship does not guarantee admission to these special screenings.
                                </li>
                            </ol>
                            <p>
                                For questions or inquiries about Tango Theatres’ Rewards Card program, please visit <span class="text-primary">www.tangotheatres.com/contact</span>
                            </p>
                        </div>
                        <div class="block-content block-content-full text-right bg-light">
                            <form action="{{ route('accept.terms') }}" method="POST" id="accept-form">@csrf</form>
                            <button type="button" class="btn btn-sm btn-light" onclick="document.getElementById('logout-form').submit();">Disagree</button>
                            <button type="button" class="btn btn-sm btn-primary" onclick="document.getElementById('accept-form').submit();">Agree</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('#terms-modal').modal({backdrop: 'static', keyboard: false});
        </script>
        @endif
        @include('partials.dashmix._notify')
    </body>
</html>
