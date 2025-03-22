<main class="row d-flex align-items-center justify-content-center">
            <div class="col-10 col-md-8 col-lg-6 p-3 text-center">
                <h1>Edit Account Information</h1>
                <hr>
                <form id="form" class="text-center p-1" action="/edit" method="post">
                    <div class="row">
                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center flex-column" style="height: fit-content;">
                            <h3>Personal Information</h3>
                            <label for="eaddress">Email Address</label>
                            <input class="text-center" type="email" id="eaddress" name="eaddress" placeholder="example@example.com" required>
                            <br>
                            <label for="pass">Password</label>
                            <input class="text-center" type="password" id="pass" name="pass" placeholder="Password" oninput="validate()" required>
                            <div class="text-center" id="checks">
                                <p class="my-0" id="length">Password must be More than 8 Digits</p>
                                <p class="my-0" id="number">Password Must Contain a Number</p>
                                <p class="my-0" id="upper">Password Must at Least 1 Upper Case Letter</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center flex-column" style="height: fit-content;">
                            <h3>Account Information</h3>
                            <label for="accountName">Account Name:</label>
                            <input class="text-center" type="text" id="accountName" name="accountName" placeholder="Account Name" maxlength="22" required>
                            <br>
                            <label for="accountNumber">Account Number:</label>
                            <input class="text-center" type="text" id="accountNumber" name="accountNumber" placeholder="Account Number" minlength="8" maxlength="8" required>
                            <p class="my-0" id="numCheck" style="opacity: 0; color: red;">Credit Card Number Invalid</p>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="d-block text-center px-2">
                                    <label for="sortCode">Sort Code:</label>
                                    <input class="text-center" type="text" minlength="6" maxlength="6" id="sortCode" name="sortCode" placeholder="00-00-00" required>
                                </div>
                                <div class="d-block text-center px-2">
                                    <label for="bank">Bank</label>
                                    <select name="bank" id="bank">
                                        <option value="HSBC">HSBC</option>
                                        <option value="Lloyds">Lloyds</option>
                                        <option value="Santander">Santander</option>
                                        <option value="Barclays">Barclays</option>
                                    </select>
                                </div>
                            </div>
                            <p class="my-0" id="sortCheck" style="opacity: 0; color: red; position: static;">Sort Code Invalid</p>
                        </div>
                    </div>
                    <button type="submit" name="submit" id="submit">Send</button>
                    <?php if (isset($validation)): ?>
                        <div class="col-12">
                            <div class="alert alert-danger" role="alert">
                                <?= validation_list_errors() ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </main>
        <script src="/assets/js/validation.js"></script>