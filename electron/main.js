const { app, BrowserWindow } = require('electron')
const path = require('path')

function createWindow () {
  const mainWindow = new BrowserWindow({
    autoHideMenuBar: true,
    width: 1300,
    height: 800,
    title: "Whatsapp Clone",
    webPreferences: {
      
    },
    resizable: true,
  })
  mainWindow.loadURL('http://127.0.0.1:8000/');
  mainWindow.setMenu(null);
}
app.whenReady().then(() => {
  createWindow()

  app.on('activate', function () {
    if (BrowserWindow.getAllWindows().length === 0) createWindow()
  })
})

app.on('window-all-closed', function () {
  if (process.platform !== 'darwin') app.quit()
})
