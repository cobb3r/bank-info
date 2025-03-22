<main class="row d-flex align-items-center justify-content-center">
            <div class="col-10 col-md-8 col-lg-6 col-xl-4 p-3 text-center">
                <h1>Delete Account</h1>
                <hr>
                <form id="form" class="d-flex align-items-center justify-content-center flex-column p-1" action="/delete" method="post">
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
                    <br>
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