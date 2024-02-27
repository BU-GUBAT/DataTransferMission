import React from 'react';
import ReactDOM from 'react-dom/client';
import {AppBar, Box, Container, Toolbar, Typography} from "@mui/material";

const App = () => {
    return(
        <>
            <Box sx={{flexGrow: 1}}>
                <AppBar position={'static'}>
                    <Toolbar>
                        <Typography
                            variant='h6'
                            component={'div'}
                            sx={{ flexGrow: 1 }}
                        >
                            API Demo
                        </Typography>
                    </Toolbar>
                </AppBar>
            </Box>
            <Container style={{ marginTop: '80px' }}>

            </Container>
        </>
    )
}

export default App;

const root = ReactDOM.createRoot(document.getElementById('app'));
root.render(<App />)
