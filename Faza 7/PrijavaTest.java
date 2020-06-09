// Generated by Selenium IDE
import org.junit.Test;
import org.junit.Before;
import org.junit.After;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.is;
import static org.hamcrest.core.IsNot.not;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.remote.RemoteWebDriver;
import org.openqa.selenium.remote.DesiredCapabilities;
import org.openqa.selenium.Dimension;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.interactions.Actions;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;
import org.openqa.selenium.JavascriptExecutor;
import org.openqa.selenium.Alert;
import org.openqa.selenium.Keys;
import java.util.*;
import java.net.MalformedURLException;
import java.net.URL;
public class PrijavaTest {
  private WebDriver driver;
  private Map<String, Object> vars;
  JavascriptExecutor js;
  @Before
  public void setUp() throws MalformedURLException {
    driver = new RemoteWebDriver(new URL("http://localhost:8080"), DesiredCapabilities.chrome());
    js = (JavascriptExecutor) driver;
    vars = new HashMap<String, Object>();
  }
  @After
  public void tearDown() {
    driver.quit();
  }
  @Test
  public void prijava() {
    driver.get("http://localhost:8080/index.php/Korisnik");
    driver.manage().window().setSize(new Dimension(1536, 824));
    driver.findElement(By.cssSelector("a:nth-child(2) > img")).click();
    driver.findElement(By.cssSelector(".col-sm-2 > a:nth-child(1) > img")).click();
    {
      WebElement element = driver.findElement(By.cssSelector(".col-sm-2 > a:nth-child(1) > img"));
      Actions builder = new Actions(driver);
      builder.moveToElement(element).perform();
    }
    driver.findElement(By.name("korime")).click();
    driver.findElement(By.name("korime")).sendKeys("jelciceva");
    driver.findElement(By.name("lozinka")).click();
    driver.findElement(By.name("lozinka")).sendKeys("jovanajelcic");
    driver.findElement(By.cssSelector("td:nth-child(1) > input")).click();
    driver.findElement(By.cssSelector(".col-sm-2 > i")).click();
    driver.findElement(By.cssSelector(".col-sm-2 > i")).click();
    {
      WebElement element = driver.findElement(By.cssSelector(".col-sm-2 > i"));
      Actions builder = new Actions(driver);
      builder.doubleClick(element).perform();
    }
    assertThat(driver.findElement(By.cssSelector(".col-sm-2 > i")).getText(), is("jelciceva"));
  }
}