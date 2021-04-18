<footer class="bs-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h3>
                    E-mail
                </h3>
                {{ $settings->contact_email }}
            </div>
            <div class="col-lg-4">
                <h3>
                    Phone number
                </h3>
                {{ $settings->contact_number }}
            </div>
            <div class="col-lg-4">
                <h3>
                    Address
                </h3>
                {{ $settings->address }}
            </div>
        </div>
        <div class="row text-center">
            {{ $settings->about }}
        </div>
        <hr>
        <ul class="bs-footer-links">
            <li>
                <a href="https://github.com/twbs/bootstrap">
                    GitHub
                </a>
            </li>
            <li>
                <a href="https://twitter.com/getbootstrap">
                    Twitter
                </a>
            </li>
            <li>
                <a href="../getting-started/#examples">
                    Examples
                </a>
            </li>
            <li>
                <a href="../about/">
                    About
                </a>
            </li>
        </ul>
        <p>
            Designed and built with all the love in the world by <a href="https://twitter.com/mdo" rel="noopener" target="_blank">@mdo</a> and <a href="https://twitter.com/fat" rel="noopener" target="_blank">@fat</a>. Maintained by the <a href="https://github.com/orgs/twbs/people">core team</a> with the help of <a href="https://github.com/twbs/bootstrap/graphs/contributors">our contributors</a>.</p> <p>Code licensed <a href="https://github.com/twbs/bootstrap/blob/main/LICENSE" target="_blank" rel="license noopener">MIT</a>, docs <a href="https://creativecommons.org/licenses/by/3.0/" target="_blank" rel="license noopener">CC BY 3.0</a>.
        </p>
    </div>
</footer>