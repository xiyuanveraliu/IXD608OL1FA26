<?php include __DIR__ . '/parts/header.php'; ?>

<main>

    <!-- Contact Hero -->
    <section class="hero">

        <p>GET IN TOUCH</p>

        <h2>We'd Love to Hear From You</h2>

        <p>
            Have a question about our jewelry,
            an order, or something else?
            Feel free to reach out.
        </p>

    </section>

    <!-- Contact Form -->
    <section class="about">

        <h2>Contact Us</h2>

        <p>
            Send us a message using the form below.
        </p>

        <form>

            <p>
                <label for="name">Name</label><br>
                <input type="text" id="name" name="name"
                       placeholder="Your name">
            </p>

            <p>
                <label for="email">Email</label><br>
                <input type="email" id="email" name="email"
                       placeholder="Your email address">
            </p>

            <p>
                <label for="message">Message</label><br>
                <textarea id="message" name="message"
                          rows="6" cols="40"
                          placeholder="Your message"></textarea>
            </p>

            <button type="button">Send Message</button>

        </form>

    </section>

    <!-- Additional Information -->
    <section class="products">

        <h2>We're Here to Help</h2>

        <p>
            Whether you're looking for the perfect piece
            or have questions about caring for your pearls,
            we're happy to help.
        </p>

        <a href="shop.php" class="button">Explore Our Collection</a>

    </section>

</main>

<?php include __DIR__ . '/parts/footer.php'; ?>

</body>
</html>