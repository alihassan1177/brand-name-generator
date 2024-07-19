<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brand Names Generator</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body class="gradient-body">
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#">Logo Here</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">YouTube</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Growth Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tools</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Use Cases</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fa fa-phone text-primary"></i>
                                <strong>Request Demo</strong>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="mt-5 pt-5">
        <section class="mb-5 pb-5">
            <div class="container">
                <div class="mb-5">
                    <h1 class="main-heading">AI-Powered <span class="text-primary">&lt;BRAND&gt;</span> Text Generator</h1>
                    <p>&lt;BRAND&gt; name generator powered by AI. Super creative and way too fun.</p>
                </div>
                <div>
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <p>Generate your unique text for your &lt;product&gt;:</p>
                            <form id="form">
                                <div class="d-flex gap-3 mb-3">
                                    <input type="text" required id="value" name="prompt" class="form-control">
                                    <button style="max-width: 250px;width: 100%;" type="button" id="generate-btn"
                                        class="btn btn-primary">Generate Text</button>
                                </div>
                            </form>
                            <div class="d-flex gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" name="check-funny" type="checkbox" value=""
                                        id="checkbox-funny">
                                    <label style="user-select: none;cursor: pointer;" class="form-check-label"
                                        for="checkbox-funny">
                                        Make it funny
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="check-romantic" type="checkbox" value=""
                                        id="checkbox-romantic">
                                    <label style="user-select: none;cursor: pointer;" class="form-check-label"
                                        for="checkbox-romantic">
                                        Make it romantic
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="check-serious" type="checkbox" value=""
                                        id="checkbox-serious">
                                    <label style="user-select: none;cursor: pointer;" class="form-check-label"
                                        for="checkbox-serious">
                                        Make it serious!
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="name-container" class="row mt-5 g-3">
                    <div style="display: none" class="col-12 loader text-center">
                        <div class="spinner-border text-primary"  role="status">
                            <span class="visually-hidden">Loading...</span>
                          </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- <section class="mb-5 pb-5">
            <div class="container">
                <h2 class="text-center mb-3 text-primary">How do I choose a &lt;Brand&gt; username?</h2>
                <p class="text-center mb-5">Our mission is providing customers with a reliable source of high income by
                    renting out our high-quality Helium mining routers with minimized risks.</p>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="bg-light rounded p-4">
                            <img class="mb-3" src="{{ asset('assets/images/landing-1-card-icon-1.svg') }}" alt="Icon 1">
                            <h3>Legal and Secure</h3>
                            <p>Lorem ipsum dolor sit amet consectetur. Cum cursus fringilla eget nibh lacus turpis
                                scelerisque vitae. Id vel eu auctor fusce arcu.</p>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="bg-light rounded p-4">
                            <img class="mb-3" src="{{ asset('assets/images/landing-1-card-icon-2.svg') }}" alt="Icon 1">
                            <h3>Reliable</h3>
                            <p>Lorem ipsum dolor sit amet consectetur. Cum cursus fringilla eget nibh lacus turpis
                                scelerisque vitae. Id vel eu auctor fusce arcu.</p>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="bg-light rounded p-4">
                            <img class="mb-3" src="{{ asset('assets/images/landing-1-card-icon-3.svg') }}" alt="Icon 1">
                            <h3>Anonymity</h3>
                            <p>Lorem ipsum dolor sit amet consectetur. Cum cursus fringilla eget nibh lacus turpis
                                scelerisque vitae. Id vel eu auctor fusce arcu.</p>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-5 pb-5">
            <div class="container">
                <h2 class="text-center mb-3 text-primary">Frequently Asked Questions</h2>
                <p class="text-center mb-5">We answer some of your Frequently Asked Questions regarding our platform. If
                    you have a query that is not answered here, Please contact us.</p>
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Accordion Item #1
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the first item's accordion body.</strong> It is shown by default, until
                                the collapse plugin adds the appropriate classes that we use to style each element.
                                These classes control the overall appearance, as well as the showing and hiding via CSS
                                transitions. You can modify any of this with custom CSS or overriding our default
                                variables. It's also worth noting that just about any HTML can go within the
                                <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Accordion Item #2
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the second item's accordion body.</strong> It is hidden by default,
                                until the collapse plugin adds the appropriate classes that we use to style each
                                element. These classes control the overall appearance, as well as the showing and hiding
                                via CSS transitions. You can modify any of this with custom CSS or overriding our
                                default variables. It's also worth noting that just about any HTML can go within the
                                <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Accordion Item #3
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <strong>This is the third item's accordion body.</strong> It is hidden by default, until
                                the collapse plugin adds the appropriate classes that we use to style each element.
                                These classes control the overall appearance, as well as the showing and hiding via CSS
                                transitions. You can modify any of this with custom CSS or overriding our default
                                variables. It's also worth noting that just about any HTML can go within the
                                <code>.accordion-body</code>, though the transition does limit overflow.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

    </main>


    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        document.querySelector("#form").addEventListener("submit", e => e.preventDefault())
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const generateBtn = document.querySelector("#generate-btn")
        generateBtn.addEventListener("click", async ()=>{
            generateBtn.disabled = true
            const prompt = document.querySelector("input[name='prompt']").value
            const is_romantic = document.querySelector("input[name='check-romantic']").checked
            const is_serious = document.querySelector("input[name='check-serious']").checked
            const is_funny = document.querySelector("input[name='check-funny']").checked
            const data = {
                prompt,
                is_romantic,
                is_funny,
                is_serious,
            };        
            if (prompt == "") {
                return
            }
            await getSuggestions(data)
            generateBtn.disabled = false
        })     

        async function getSuggestions(data) {
            document.querySelector("#name-container").innerHTML = `<div class="col-12 loader text-center">
                        <div class="spinner-border text-primary"  role="status">
                            <span class="visually-hidden">Loading...</span>
                          </div>
                    </div>`

            const request = await fetch('{{ route('suggestions') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token 
                },
                body: JSON.stringify(data)
            })
            const response = await request.json()
            console.log(response);


            $markup = ""
            response.data.forEach(name => {
                $markup += `<div class="col-md-3">
                <div class="p-2 border border-primary border-2 text-primary fw-semibold bg-light rounded w-100 text-center">${name}</div>
            </div>`                
            });

            document.querySelector("#name-container").innerHTML = $markup 
        }

    </script>


</body>

</html>