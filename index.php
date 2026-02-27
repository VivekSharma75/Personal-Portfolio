<?php include 'includes/header.php'; ?>

<section class="hero">
    <!-- Animated background blobs -->
    <div class="hero-blob blob-1"></div>
    <div class="hero-blob blob-2"></div>
    <div class="hero-blob blob-3"></div>

    <div class="hero-content">
        <div class="hero-badge">
            <span class="dot"></span> Available for Opportunities
        </div>
        <h1>
            Hello, I'm<br>
            <span class="hero-name">Vivek Sharma.</span>
        </h1>
        <p class="hero-sub">MCA Student &amp; Full-Stack Developer from Kota, Rajasthan</p>
        <div class="typewriter-wrap">
            <span id="typewriter"></span>
        </div>
        <div class="cta-buttons">
            <a href="projects.php" class="btn btn-primary"><i class="fas fa-rocket"></i> View My Work</a>
            <a href="contact.php" class="btn btn-outline"><i class="fas fa-paper-plane"></i> Let's Connect</a>
        </div>

        <div class="hero-stats">
            <div class="stat-item">
                <span class="stat-num" data-target="3">0</span>
                <span class="stat-label">Real Projects</span>
            </div>
            <div class="stat-item">
                <span class="stat-num" data-target="2">0</span>
                <span class="stat-label">Years Learning</span>
            </div>
            <div class="stat-item">
                <span class="stat-num" data-target="5">0</span>
                <span class="stat-label">Tech Stacks</span>
            </div>
        </div>
    </div>
</section>

<section id="about" class="section">
    <div class="container">
        <div class="section-title reveal">
            <span class="section-tag">About</span>
            <h2>Who Am I?</h2>
            <p>A passionate developer driven by curiosity and code.</p>
        </div>
        <div class="about-grid">
            <div class="about-avatar reveal-left">
                <div class="avatar-ring">
                    <div class="avatar-inner">🧑‍💻</div>
                </div>
            </div>
            <div class="about-text reveal-right">
                <h3>Building solutions, one commit at a time.</h3>
                <p>
                    I'm a Full-Stack & MERN Stack Developer pursuing my Master of Computer Applications (MCA)
                    with a specialization in Data Science from Kota, Rajasthan. I love building user-friendly
                    applications that solve real-world problems.
                </p>
                <p>
                    From CRM systems and e-commerce platforms to data-driven solutions — I'm currently expanding
                    my expertise in MERN Stack development and Machine Learning.
                </p>
                <div class="about-info">
                    <div class="info-item">
                        <span>Status</span>
                        <span>MCA Student + Developer</span>
                    </div>
                    <div class="info-item">
                        <span>Location</span>
                        <span>Kota, Rajasthan</span>
                    </div>
                    <div class="info-item">
                        <span>Specialization</span>
                        <span>Data Science</span>
                    </div>
                    <div class="info-item">
                        <span>Email</span>
                        <span>vsharma.vivek.in@gmail.com</span>
                    </div>
                </div>
                <a href="experience.php" class="btn btn-ghost"><i class="fas fa-graduation-cap"></i> My Journey</a>
            </div>
        </div>
    </div>
</section>

<section id="skills" class="section section-alt">
    <div class="container">
        <div class="section-title reveal">
            <span class="section-tag">Skills</span>
            <h2>Technical Expertise</h2>
            <p>Technologies I work with to bring ideas to life.</p>
        </div>
        <div class="skills-grid">
            <div class="skill-card reveal delay-1">
                <div class="skill-icon sk-indigo"><i class="fab fa-php"></i></div>
                <h3>PHP & MySQL</h3>
                <p>CRM, E-Commerce, Full-Stack Apps</p>
            </div>
            <div class="skill-card reveal delay-2">
                <div class="skill-icon sk-cyan"><i class="fab fa-react"></i></div>
                <h3>MERN Stack</h3>
                <p>MongoDB, Express, React, Node.js</p>
            </div>
            <div class="skill-card reveal delay-3">
                <div class="skill-icon sk-green"><i class="fab fa-python"></i></div>
                <h3>Python</h3>
                <p>Pandas, NumPy, Scikit-learn</p>
            </div>
            <div class="skill-card reveal delay-4">
                <div class="skill-icon sk-orange"><i class="fas fa-database"></i></div>
                <h3>Data Science</h3>
                <p>SQL, Analysis, Visualization</p>
            </div>
            <div class="skill-card reveal delay-5">
                <div class="skill-icon sk-yellow"><i class="fab fa-js-square"></i></div>
                <h3>JavaScript</h3>
                <p>ES6+, DOM, REST APIs</p>
            </div>
            <div class="skill-card reveal delay-3">
                <div class="skill-icon sk-purple"><i class="fas fa-brain"></i></div>
                <h3>Machine Learning</h3>
                <p>Algorithms, Predictive Modeling</p>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
