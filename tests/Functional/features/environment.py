from selenium import webdriver


# Instrucciones antes de la ejecución de cada escenario, configura driver de
# selenium y abre la instancia del navegador
def before_scenario(context, scenario):
    if not hasattr(context, 'driver'):
        chrome_options = webdriver.ChromeOptions()
        # chrome_options.add_argument("--window-size=1920x1080")
        # chrome_options.add_argument('--headless')
        # chrome_options.add_argument('--disable-gpu')
        # chrome_options.add_argument('--no-sandbox')

        context.driver = webdriver.Chrome(chrome_options=chrome_options)

    context.driver.set_window_size(1920, 1080)
    context.driver.get('http://localhost:8000')


# Instrucciones después de la ejecución de cada escenario, cierra el driver de
# selenium
def after_scenario(context, scenario):
    if hasattr(context, 'driver'):
        context.driver.quit()
